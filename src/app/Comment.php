<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'reminder_date', 'task_id'];

    /**
     * The task that comment  belong to .
     */
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
