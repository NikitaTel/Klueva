<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/profile', function () {
        return view('profile', ['user' => Auth::user(), 'gruz_success'=>false, 'transport_success'=>false]);
})->name('profile');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logoutUser');


Route::get('/', function () {
    return view('home', ['users' => User::all(), 'ok'=>null]);
})->name('home');

Route::get('/filter', function () {
    return view('filter', ['ok'=>null,'users' => User::all()]);
})->name('filter');


Route::get('/filter_transport', function () {
    return view('filter_transport', ['ok'=>null,'users' => User::all()]);
})->name('filter_transport');

Route::get('/strangersProfile', function () {
    return view('strangersProfile', ['users'=>User::all()]);
})->name('strangersProfile');

Route::get('/gruz_poisk', 'GruzPoisk@filter')->name('gruz_poisk');
Route::get('/transport_poisk', 'TransportPoisk@filter')->name('transport_poisk');
Route::get('/company_poisk', 'CompanyPoisk@filter')->name('company_poisk');
Route::get('/user_poisk', 'UserPoisk@filter')->name('user_poisk');
Route::get('/company_name', function () {
    return view('poisk.company_poisk');
})->name('company_name');

Route::post('/addgruz', 'AddNewGruz@add')->name('addgruz');
Route::post('/addtransport', 'AddNewTransport@add')->name('addtransport');
Route::post('/make_request', 'MakeRequest@addGruz')->name('make_request')->middleware('auth');
Route::post('/make_transport_request', 'MakeRequest@addTransport')->name('make_transport_request')->middleware('auth');
Route::post('/add_document', 'AddDocument@add')->name('addDocument');
Route::post('/add_review', 'AddReview@add')->name('addReview')->middleware('auth');
Route::post('/request_partner', 'Partner@request')->name('request_partner')->middleware('auth');
Route::post('/decline_partner', 'Partner@decline')->name('decline_partner')->middleware('auth');
Route::post('/accept_partner', 'Partner@accept')->name('accept_partner')->middleware('auth');
Route::post('/archive', 'Archive@add')->name('archive')->middleware('auth');
Route::post('/archive_delete', 'Archive@delete')->name('archive_delete')->middleware('auth');

Route::get('/gruz', function () {
    return view('gruz_page', ['id'=>null]);
})->name('gruz_page');

Route::get('/transport', function () {
    return view('transport_page', ['id'=>null]);
})->name('transport_page');


Route::get('/filter_company', function () {
    return view('filter_company');
})->name('filter_company');

Route::get('/filter_users', function () {
    return view('admin.filter_users');
})->name('filter_users');

Route::get('/delete_gruz{id}', 'DeleteGruz@delete')->name('delete_gruz');
Route::get('/delete_transport{id}', 'DeleteTransport@delete')->name('delete_transport');
Route::get('/delete_document{id}', 'DeleteDocument@delete')->name('delete_document');
Route::get('/delete_user{id}', 'DeleteUserController@delete')->name('delete_user');
Route::get('/delete_review{id}', 'DeleteReview@delete')->name('delete_review');
