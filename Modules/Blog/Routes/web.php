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
    Route::get('/', 'PostsController@blog');
    Route::get('/{post}', 'PostsController@show')->name('post.show');
    Route::get('categorias/{category}', 'CategoriesController@show')->name('categories.show');
    Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

    Route::group([
        'middleware' => ['web', 'auth'], 
        'prefix' => 'admin'],
        function()
        {
            //Route::get('post', 'PostsController@index')->name('dashboard');
            Route::get('/post', 'PostsController@index')->name('allPosts');
            Route::get('/post/create', 'PostsController@create')->name('post.create');
            Route::post('/post', 'PostsController@store')->name('post.store');
            Route::get('/post/edit/{post}', 'PostsController@edit')->name('post.edit');
            Route::put('/post/update/{post}', 'PostsController@update')->name('post.update');
            Route::delete('/post/delete/{post}', 'PostsController@destroy')->name('post.destroy');

            Route::post('post/{post}/photos', 'PhotosController@store')->name('photos.store');
            Route::delete('post/{photo}', 'PhotosController@destroy')->name('photos.destroy');
            // rotas do blog
        }
    );
});

// Route::group(['prefix' => 'laravel-crud-search-sort-ajax-modal-form'], function () {
//     Route::get('/', 'Crud5Controller@index');
//     Route::match(['get', 'post'], 'create', 'Crud5Controller@create');
//     Route::match(['get', 'put'], 'update/{id}', 'Crud5Controller@update');
//     Route::delete('delete/{id}', 'Crud5Controller@delete');
// });