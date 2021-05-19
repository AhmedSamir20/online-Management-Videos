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


    Route::group(['prefix'=>'admin','namespace' => 'BackEnd','middleware'=>'admin'],function (){

//        Route::get('users','UserController@index');
//        Route::get('users/create','UserController@create');
//        Route::post('users','UserController@store');
//        Route::get('users/{id}','UserController@edit');
//        Route::post('users/{id}','UserController@update');
//        Route::get('users/delete/{id}','UserController@delete');

        Route::get('home','Home@index')->name('admin.home');
        Route::resource('users','UserController')->except(['show',]);
        Route::resource('categories', 'CategoriesController')->except(['show']);
        Route::resource('skills', 'SkillsController')->except(['show']);
        Route::resource('tags', 'TagsController')->except(['show']);
        Route::resource('pages', 'PagesController')->except(['show']);
        Route::resource('videos', 'VideosController')->except(['show']);
        Route::resource('messages', 'MessagesController')->only(['index','edit','destroy']);
        Route::post('message/replay/{id}', 'MessagesController@replay')->name('message.replay');


        ##################################comments#########################
        Route::post('comments', 'VideosController@commentStore')->name('comment.store');
        Route::get('comments/{id}', 'VideosController@commentDelete')->name('comment.delete');
        Route::post('comments/{id}', 'VideosController@commentUpdate')->name('comment.update');


    });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skills')->name('front.skill');
Route::get('tag/{id}', 'HomeController@tags')->name('front.tags');
Route::get('video/{id}', 'HomeController@video')->name('frontend.video');
Route::get('contact-us', 'HomeController@MassageStore')->name('contact.store');
Route::get('/','HomeController@welcome')->name('home.page');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');





Auth::routes();


Route::group(['middleware'=>'auth'],function (){

    Route::post('comments/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
    Route::post('comments/{id}/create', 'HomeController@commentStore')->name('front.commentStore');
    Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');

});
