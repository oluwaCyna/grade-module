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

// Route::prefix('grade')->group(function() {
//     Route::get('/', 'GradeController@index');
// });

use Illuminate\Support\Facades\Route;
use Modules\Grade\Http\Controllers\GradeController;

Route::prefix('exam')->group(function() {
    // Route::resource('term', TermController::class);
    // Route::get('mark/{session}/{term}/{branch}/{class}/{section}/{subject}', [MarkController::class, 'studentMark'])->name('student-mark');
    // Route::post('mark-distribution-entry/{session}/{term}/{branch}/{class}/{section}/{subject}', [MarkController::class, 'studentMarkEntry'])->name('mark-distribution-entry');
    // Route::resource('/mark', MarkController::class);//->name('exam.mark');
    // Route::resource('/distribution', DistributionController::class);//->name('exam.distribution');
    Route::resource('/grade', GradeController::class);//->name('exam.grade');
});