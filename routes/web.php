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

use App\Category;
use Illuminate\Support\Facades\Route;

//Auth::routes();

Route::get('/login','LoginController@show')->name('login')->middleware('register');
Route::post('/login','LoginController@process');
Route::get('/register','RegisterController@show')->name('register')->middleware('register');
Route::post('/register','RegisterController@process');
Route::post('/logout','LoginController@logout')->name('logout');

//user
Route::get('/', 'HomeController@index')->name('home');
Route::get('posts','PostController@index')->name('posts.index');
//Route::get('/markAsRead',function (){
//    auth()->user()->unreadNotifications->markAsRead();
//});
//Route::get('/notifications',function (){
//    auth()->user()->unreadNotifications->markAsRead();
//    $categories=Category::all();
////        $notifications=auth()->user()->notifications;
//    $notifications = auth()->user()->notifications()->orderBy('created_at','desc')->take(5)->get();
////        dd($notifications);
////        auth()->user()->unreadNotifications->markAsRead();
//    return view('notifications',compact('categories','notifications'));
//})->name('notify');

Route::group(['middleware'=>['auth']],function (){
    Route::get('offer/{id}','PostController@details')->name('post.details');
    Route::get('/profile','ProfileController@profile')->name('user.profile');
    Route::get('/applyList','ProfileController@appFormlist')->name('user.applist');
    Route::get('/password','ProfileController@password')->name('user.password');
    Route::put('/password-update','ProfileController@updatePassword')->name('password.update');
    Route::get('profile/{username}','AuthorController@profile')->name('author.profile');
    Route::get('application/{id}','ApplicationController@showForm')->name('applyforLoan');
    Route::get('application-progress/{id}','ApplicationController@applyUpdate')->name('applicationProgress');
    Route::post('application/{id}','ApplicationController@processForm');
    Route::get('/notifications','HomeController@notify')->name('notify');

});


Route::get('/category/{slug}','PostController@postByCategory')->name('category.posts');
Route::post('subscriber','SubscriberController@store')->name('subscriber.store');
Route::get('/search','SearchController@search')->name('search');


//Author
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['register']],function (){
    Route::get('/register','RegisterController@show')->name('register');
    Route::post('/register','RegisterController@process');
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

});

//admin
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin']],function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');

    Route::get('pending/post','PostController@pending')->name('post.pending');
    Route::put('/post/{id}/approve','PostController@approved')->name('post.approve');
    Route::get('authors','AuthorController@index')->name('author.index');
    Route::delete('authors/{id}','AuthorController@destroy')->name('author.destroy');
//    Route::get('/favorite','FavoriteController@index')->name('favorite.index');
//    Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
//    Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');
    Route::post('/logout','RegisterController@logout')->name('logout');
});
//author
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['authenticated']],function (){

    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('post','PostController');
    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');
    Route::post('/logout','RegisterController@logout')->name('logout');
    Route::get('loanApplications','LoanApplicationController@index')->name('application.index');
    Route::get('loanApplication/{id}','LoanApplicationController@details')->name('application.details');
    Route::put('loanApplication/{application}','LoanApplicationController@applyUpdate')->name('application.progress');
    Route::delete('loanApplications/{id}','LoanApplicationController@delete')->name('application.destroy');
});
//Route::group(['middleware'=>['auth']],function (){
//    Route::post('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
//    Route::post('comment/{post}','CommentController@store')->name('comment.store');
//});
