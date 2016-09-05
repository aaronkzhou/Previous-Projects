<?php

namespace App\Http\Controllers;

use App\Cart;
use Log;
use Illuminate\Http\Request;
use App\Http\Requests;


class CartController extends Controller
{
    public function getAllCartInfo(){
    	return Cart::get();
    }
    public function getAllProductInfo(){
        $product=array(
         array("name" => "Sledgehammer", "price" => 125.75),
         array("name" => "Axe", "price" => 190.50),
         array("name" => "Bandsaw", "price" => 562.13),
         array("name" => "Chisel", "price" => 12.9),
         array("name" => "Hacksaw", "price" => 18.45)
         );
        return $product_json=json_encode($product);
    }
    public function store(Request $request){
    	Cart::create([
    		'author'=>$request->author,
    		'text'=>$request->text
    	]);
    }
    public function deletecomment($id){
    	Cart::destroy($id);
    	return (array('success'=>true));
    }
}
