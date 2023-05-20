<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('subjects', SubjectController::class)->except(['index']);
    Route::resource('students', StudentController::class);
    Route::get('/attach-subjects/{student}', [EnrollController::class, 'getAssignSubjects'])->name('get.attach.subjects');
    Route::post('/attach-subjects/{student}', [EnrollController::class, 'postAssignSubjects'])->name('post.attach.subjects');
    Route::get('/subject/{subject}/marks/{student}', [MarkController::class, 'getAddMarks'])->name('get.add.marks');
    Route::post('/subject/{subject}/marks/{student}', [MarkController::class, 'postAddMarks'])->name('post.add.marks');
});

Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');

require __DIR__ . '/auth.php';
