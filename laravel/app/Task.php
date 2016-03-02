<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
    the attributes below are mass-assignable
     */
    protected $fillable = ['name'];
}
