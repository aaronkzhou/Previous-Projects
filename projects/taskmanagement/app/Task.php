<?php

namespace App;

use App\User
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{/* 
	the atributes that are massassignable
	*/
    protected $fillable=['name'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
