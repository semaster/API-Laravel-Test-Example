<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description'];

    /**
     * The users that belong to the task.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    /**
     * Get all of the comments for the task.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
