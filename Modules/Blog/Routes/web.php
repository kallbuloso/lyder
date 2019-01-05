<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::prefix('blog')->group(function() {
//     Route::get('/', 'BlogController@index');
//     Route::get('/posts', function(){
//         return Modules\Blog\Models\Post::all();
//     });
// });

Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index');

    Route::group([
        'middleware' => ['web', 'auth'], 
        'prefix' => 'admin'],
        function()
        {
            Route::get('/', 'PostsController@index')->name('dashboard');
            Route::get('/post', 'PostsController@index')->name('allPosts');
            Route::get('/create', 'PostsController@create')->name('post.create');
            Route::post('/', 'PostsController@store')->name('postStore');
            Route::get('posts/{post}', 'PostsController@edit')->name('postEdit');
            Route::put('posts/{post}', 'PostsController@update')->name('postUpdate');
            // rotas do blog
        }
    );
});