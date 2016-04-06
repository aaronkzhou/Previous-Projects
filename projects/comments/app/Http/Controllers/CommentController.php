<?php

namespace App\Http\Controllers;
use App\Comment;
use Log;
//use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class CommentController extends Controller
{
    public function getall(){

    	return Comment::get();

    }
    public function store(Request $request){

    	Comment::insert([
    		'author'=>$request->author,
    		'text'=>$request->text
    	]);

    	//return (var_dump($request->input()));
    }
    public function deletecomment($id){
    	Comment::destroy($id);
        Log::warning('Something could be going wrong.');
    	return (array('success'=>true));
    }
    
}
