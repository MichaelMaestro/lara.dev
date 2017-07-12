<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskImage extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','path'];

    

      public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
