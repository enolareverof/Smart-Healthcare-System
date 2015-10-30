<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\Permission;
use App\User;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		// Creating Roles
		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'User Administrator'; // optional
		$admin->description  = 'User is allowed to manage and edit'; // optional
		$admin->save();

		$moderator = new Role();
		$moderator->name         = 'moderator';
		$moderator->display_name = 'Moderator'; // optional
		$moderator->description  = 'Moderator is allowed to moderate'; // optional
		$moderator->save();

		$user = new Role();
		$user->name         = 'user';
		$user->display_name = 'General User'; // optional
		$user->description  = 'General User is allowed to use facilities of the site'; // optional
		$user->save();

		// creating an array of roles
		$roles = array($admin,$moderator,$user);
		
		// assigning roles to user
		$users = User::all();
		foreach ($users as $u) {
			$u->attachRole($roles[rand(0,2)]);
		}
	}
}
