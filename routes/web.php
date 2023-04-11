<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

Route::get('/', [ListingController::class, 'index']);
/* Route::get('/listings/{id}', function ($id) {
    return view('listing', [

        'listing' => Listing::find($id)
    ]);
}); */

/* Route::get('/listings/{id}', function ($id) {
    $listing = Listing::find($id);
    if ($listing) {
        return view('listing', [

            'listing' => $listing
        ]);
    } else {
        abort(404);
    }
}); */


// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

/* 
Route::get('/hello',function(){

    return response("<h1>hello world</h1>",200)
    ->header("Content-Type","text/plain")
    ->header("foo","test");// custome header 
});

Route::get('/posts/{id}',function($id){
    // dd($id); var_dumb and die
    // ddd($id); var_dumb die debug 
    return response("post: ". $id,200);
})
->where('id',"[0-9]+"); // add filter to accept only numbers

Route::get('/search',function(Request $request){
   dd($request->name);
}); */