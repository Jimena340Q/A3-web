<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnvironmentTypeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LearningEnvironmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SchedulingEnvironmentController;
use App\Models\Career;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [AuthController::class, 'index']);

Route::middleware('auth')->get('/index', function () {
    return view('index');
    
})->name('index');

Route::prefix('auth')->group(function(){
    Route::get('/index', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/register', [AuthController::class, 'create'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
  
});


Route::middleware('auth')->prefix('career')->group(function(){
    Route::get('/index', [CareerController::class, 'index'])->name('career.index');
    Route::get('/create', [CareerController::class, 'create'])->name('career.create');
    Route::get('/edit/{id}', [CareerController::class, 'edit'])->name('career.edit');
    Route::post('/create', [CareerController::class, 'store'])->name('career.store');
    Route::put('/edit/{id}', [CareerController::class, 'update'])->name('career.update');
    Route::get('/destroy/{id}', [CareerController::class, 'destroy'])->name('career.destroy');
}); 


Route::middleware('auth')->prefix('course')->group(function(){
    Route::get('/index', [CourseController::class, 'index'])->name('course.index');
    Route::get('/create', [CourseController::class, 'create'])->name('course.create');
    Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('/create', [CourseController::class, 'store'])->name('course.store');
    Route::put('/edit/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::get('/destroy/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
}); 

Route::middleware('auth')->prefix('environment_type')->group(function(){
    Route::get('/index', [EnvironmentTypeController::class, 'index'])->name('environment_type.index');
    Route::get('/create', [EnvironmentTypeController::class, 'create'])->name('environment_type.create');
    Route::get('/edit/{id}', [EnvironmentTypeController::class, 'edit'])->name('environment_type.edit');
    Route::post('/create', [EnvironmentTypeController::class, 'store'])->name('environment_type.store');
    Route::put('/edit/{id}', [EnvironmentTypeController::class, 'update'])->name('environment_type.update');
    Route::get('/destroy/{id}', [EnvironmentTypeController::class, 'destroy'])->name('environment_type.destroy');
}); 



Route::middleware('auth')->prefix('instructor')->group(function(){
    Route::get('/index', [InstructorController::class, 'index'])->name('instructor.index');
    Route::get('/create', [InstructorController::class, 'create'])->name('instructor.create');
    Route::get('/edit/{id}', [InstructorController::class, 'edit'])->name('instructor.edit');
    Route::post('/create', [InstructorController::class, 'store'])->name('instructor.store');
    Route::put('/edit/{id}', [InstructorController::class, 'update'])->name('instructor.update');
    Route::get('/destroy/{id}', [InstructorController::class, 'destroy'])->name('instructor.destroy');
}); 

Route::middleware('auth')->prefix('learning_environment')->group(function(){
    Route::get('/index', [LearningEnvironmentController::class, 'index'])->name('learning_environment.index');
    Route::get('/create', [LearningEnvironmentController::class, 'create'])->name('learning_environment.create');
    Route::get('/edit/{id}', [LearningEnvironmentController::class, 'edit'])->name('learning_environment.edit');
    Route::post('/create', [LearningEnvironmentController::class, 'store'])->name('learning_environment.store');
    Route::put('/edit/{id}', [LearningEnvironmentController::class, 'update'])->name('learning_environment.update');
    Route::get('/destroy{id}', [LearningEnvironmentController::class, 'destroy'])->name('learning_environment.destroy');
}); 
Route::middleware('auth')->prefix('location')->group(function(){
    Route::get('/index', [LocationController::class, 'index'])->name('location.index');
    Route::get('/create', [LocationController::class, 'create'])->name('location.create');
    Route::get('/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::post('/create', [LocationController::class, 'store'])->name('location.store');
    Route::put('/edit/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::get('/destroy/{id}', [LocationController::class, 'destroy'])->name('location.destroy');
}); 


Route::middleware('auth')->prefix('scheduling_environment')->group(function(){
    Route::get('/index', [SchedulingEnvironmentController::class, 'index'])->name('scheduling_environment.index');
    Route::get('/create', [SchedulingEnvironmentController::class, 'create'])->name('scheduling_environment.create');
    Route::get('/edit/{id}', [SchedulingEnvironmentController::class, 'edit'])->name('scheduling_environment.edit');
    Route::post('/create', [SchedulingEnvironmentController::class, 'store'])->name('scheduling_environment.store');
    Route::put('/edit/{id}', [SchedulingEnvironmentController::class, 'update'])->name('scheduling_environment.update');
    Route::get('/destroy/{id}', [SchedulingEnvironmentController::class, 'destroy'])->name('scheduling_environment.destroy');
}); 



 