<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function posts()
    {

      return $this->hasMany(Post::class);

    }

    public function comments()
    {

      return $this->hasMany(Comment::class);

    }

    public function publish(Post $post)
    {

      $this->posts()->save($post);

    }

    public function modify(Post $post)
    {

      $post->where('id', $post->id)
      ->update([
        'title' => $post->title,
        'body' => $post->body
      ]);
    }


    /*public function setPasswordAttribute($password)
    {
      $this->attributes['password'] = bcrypt($password);
    }*/

    public function getId()
    {
      return $this->id;
    }





}
