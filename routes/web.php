<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\classesController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\SettingsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Group ROUTE
// Route::group(['middlware'=>"customAuth"]);
// Login (HOME PAGE) Route
Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'0);
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showlogin' ]);
Route::post('loginToTheDashboard', [App\Http\Controllers\Auth\LoginController::class, 'loginFunction' ]);

// Main Dashboard

// LOGOUT User
Route::post('logout', [App\Http\Controllers\Auth\ExitController::class, 'logOutUser' ])->name('logoutuser')->middleware('auth');

// After The user wants to login
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showsignup']);

Route::post('createAnAccount', [App\Http\Controllers\Auth\RegisterController::class, 'signUpFunction' ]);

// START Routes For Student Section
Route::middleware(['auth'])->group(function () {
    Route::get('MainDashboard', [studentController::class, 'index' ]);
    // Routes that require authentication go here
    Route::get('addNewStudent', [studentController::class, 'show' ]);

    Route::post('insertStudentToDatabase', [studentController::class, 'store' ]);
    Route::get('/edit/{students}/edit', [studentController::class, 'edit' ]);
    Route::put('/edit/{students}', [studentController::class, 'update' ]);
    Route::delete('/delete/{students}', [studentController::class, 'destroy' ]);
    // END Routes For Student Section

    // START Routes For Teacher Section
    Route::get('teachers', [teacherController::class, 'index' ]);
    Route::get('addNewTeacher', [teacherController::class, 'create' ]);
    route::get('test', function () {
        $student=Student::first();
        dd($student->load('classes'));
    });
    Route::post('insertTeacherToDatabase', [teacherController::class, 'store' ]);
    Route::get('/teachers/{teachers}/teachers', [teacherController::class, 'edit' ]);
    Route::put('/teachers/{teachers}', [teacherController::class, 'update' ]);
    Route::delete('/teacher/{teachers}', [teacherController::class, 'destroy' ]);

    // END Routes For Teacher Section

    // START Routes For Subject Section
    Route::get('subject', [subjectController::class, 'index' ]);
    Route::get('addNewSubject', [subjectController::class, 'create' ]);

    Route::post('insertSubjectToDatabase', [subjectController::class, 'store' ]);
    Route::get('/subject/{subjects}/subject', [subjectController::class, 'edit' ]);
    Route::put('/subject/{subjects}', [subjectController::class, 'update' ]);
    Route::delete('/subject/{subjects}', [subjectController::class, 'destroy' ]);
    // END Routes For Subject Section

    // START Routes For Class Section
    Route::get('class', [classesController::class, 'index' ]);
    Route::get('addNewClass', [classesController::class, 'create' ]);

    Route::post('insertClassToDatabase', [classesController::class, 'store' ]);
    Route::get('/class/{classes}/class', [classesController::class, 'edit' ]);
    Route::put('/class/{classes}', [classesController::class, 'update' ]);
    Route::delete('class/{classes}', [classesController::class, 'destroy' ]);
    // END Routes For Class Section

    // START Route For Setting Section
    Route::get('settings', [SettingsController::class, 'settingFunction' ]);
    Route::get('EditAccount', [SettingsController::class, 'EditAccount']);

    route::get('settings', function () {
        return view('settingsDashboard');
    })->middleware('isLogged');
    Route::get('settings/{account}/settings', [SettingsController::class, 'editSettings' ]);
    Route::put('/settings/{account}', [SettingsController::class, 'updateSettings' ]);
    Route::delete('settingsDelete/{account}', [SettingsController::class, 'deleteAccount' ]);
    // END Route For Setting Section
});
