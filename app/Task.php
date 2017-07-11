<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];


    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

}
