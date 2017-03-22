<?php

Use App\User;
Use App\Post;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Create

Route::get('/create/{id}', function($id){

$user = User::findOrFail($id);

$post = new Post(['title'=>'post 22222', 'body'=>'3ewwwwwwwwwwwwwwwwwwwwww']);

$user->posts()->save($post);

//Another way below
   // $user->posts()->save(new Post(['title'=>'post tile', 'body'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx']));
});


//Read

Route::get('/read/{id}', function($id){

   $user = User::findOrFail($id) ;

   foreach ($user->posts as $post){

       echo $post->title." ".$post->body."<br>";


   }
});

//Update

Route::get('/update/{user_id}/{post_id}', function($user_id, $post_id){

$user=User::findorFail($user_id);

$user->posts()->whereId($post_id)->update(['title'=>'99999', 'body'=>'vvvvvvvvvvvvvv']);

return;
});


//Delete

Route::get('/delete/{user_id}/{post_id}', function($user_id, $post_id){

  $user=User::findOrFail($user_id);

  $user->posts()->whereId($post_id)->delete();

  //Delete all posts
   // $user->posts()->delete();

  return;
});