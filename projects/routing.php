<?php

Route::get('foo',function()){
	return 'hello world';
};

Route::match(['get','post'],'/',function(){

};
Route::get('user/{id}',function()){
	return 'user'.$id;
}
->where('name','[A-Za-z]+');
