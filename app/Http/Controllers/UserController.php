<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Http\Requests\user\LogInRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Role;

use Hash;
use Mail;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\user\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // getting all the inputs from input field
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        // generating 60 characters activation code
        $activation_code = str_random(60); 

        // creating the user
        $user = User::create(array(
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'activation_code' => $activation_code,
            'activated' => 0,
        ));

        $data = array(
            'link' => url('user/activate', [$activation_code]),
            'name' => $name
        );

        // sending mail to the user whose account has been created
        Mail::send('emails.activation_code', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Activate Your Account !');
        });

        session()->flash('flash_message','Your Account Has Been Created ! We have sent you an activation code via mail.');

        // showing the message regarding account activation
        return redirect()->route('user.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\user\UpdateUserRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Activate the user into the system.
     *
     * @return \Illuminate\Http\Response
     */
    public function activate($activation_code)
    {
        // getting all the users that matches the activation code
        $user = User::where('activation_code','=',$activation_code);

        // if there at least one user exist that matches the activation code
        if($user->count()){

            // getting the first user
            $user = $user->first();

            // updating user to active state
            $user->activated = 1;
            $user->activation_code = '';

            // saving the update
            $user->save();

            session()->flash('flash_message','Your Account Has Been Activated ! Please Log in.');

            // showing the message regarding account activation
            return redirect()->route('user.get.login');
        }

        // if no user has been found that matches the activation code
        session()->flash('flash_message','Activation Failed !');

        return redirect()->route('user.create');
    }

    /**
     * Show the form for logging in.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogIn()
    {
        return view('user.login');
    }

    /**
     * Store a log in approach.
     *
     * @param  \App\Http\Requests\user\LogInRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postLogIn(LogInRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember') ? true : false;

        $user_data = array(
            'email' => $email,
            'password' => $password,
            'activated' => 1
        );

        // authenticating the user
        $authentication = Auth::attempt($user_data, $remember);

        // if authentication passes
        if ($authentication) {

            session()->flash('flash_message','You have successfully logged in !');

            $fallback_url = route('user.show', Auth::user()->id);

            return redirect()->intended($fallback_url);
        }

        // if authentication fails
        session()->flash('flash_message','Authetication Failed !');

        return redirect()->route('user.get.login')->withInput();
    }

    /**
     * Log out the authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogOut()
    {
        Auth::logout();

        session()->flash('flash_message','Your have logged out !');

        return redirect()->route('user.get.login');
    }
}
