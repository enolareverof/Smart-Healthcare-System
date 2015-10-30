<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'category_id','user_id','read_count'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category of which the post belongs to.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the comments under the post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
