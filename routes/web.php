<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsurerController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

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


//if there is user, redirect to validateUser, if not, redirect to login
Route::get('/', [UserController::class, 'validateUser'])->name('validateUser');

Route::get('/', [HomeController::class, 'index'])->name('home');
//home index
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::view('/about', 'about')->name('about');

Route::resource('projects', ProjectController::class)
->parameters(['projects' => 'project'])
->names('projects');

Route::resource('course', CourseController::class)->names('course');
//route for course.signUp
Route::get('course/{course}/signUp', [CourseController::class, 'signUp'])->name('course.signUp');
Route::get('course/{course}/optOut', [CourseController::class, 'optOut'])->name('course.optOut');

Route::resource('insurers', InsurerController::class)->names('insurers');

Route::resource('sponsor', SponsorController::class)->names('sponsor');
/*Create a sponsor.generate route to generate a PDF bill*/
Route::get('sponsor/{sponsor}/generate', [SponsorController::class, 'generate'])->name('sponsor.generate');
//sponsor setprice route
Route::post('/sponsor', [SponsorController::class, 'setprice'])->name('sponsor.setprice');


//create a user route that calls index method of the UserController
Route::get('/user', [UserController::class, 'index'])->name('user.index');
//rouote at /validateUser that calls the validateUser method of the UserController
Route::get('/validateUser', [UserController::class, 'validateUser'])->name('validateUser');
//create user.validate view route with the user as parameter
Route::get('/validateUser/{user}', [UserController::class, 'show'])->name('user.validate');
//create update route to update the user
Route::patch('/validateUser/{user}', [UserController::class, 'update'])->name('user.update');

/*
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

Route::get('/projects/{project}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
*/

Route::view('/contact', 'contact')->name('contact');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');


Route::post('contact', [MessageController::class, 'store'])->name('messages.store');

//Auth::routes(['register' => false]);
Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');