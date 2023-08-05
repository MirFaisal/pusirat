<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestCaseController;
use App\Http\Controllers\TestFileController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// all test files
Route::get('/', [TestFileController::class, 'index'])->middleware(['auth', 'verified'])->name('file.show');
// test file create
Route::get('file/create/{id}', [TestFileController::class, 'fileCreate'])->middleware(['auth', 'verified'])->name('file.create');
// test title store
Route::post('title/store', [TestFileController::class, 'store'])->middleware(['auth', 'verified'])->name('title.store');
// test file details store
Route::post('file/create/{id}/details/store', [TestFileController::class, 'addDetails'])->middleware(['auth', 'verified'])->name('file.details.store');
// test file investigator store
Route::post('file/create/{id}/investigator/store', [TestFileController::class, 'addInvestigator'])->middleware(['auth', 'verified'])->name('investigator.store');
// test file responsible store
Route::post('file/create/{id}/responsible/store', [TestFileController::class, 'addResponsible'])->middleware(['auth', 'verified'])->name('responsible.store');
//show file details.
Route::get('file/details/{id}', [TestFileController::class, 'viewDetails'])->middleware(['auth', 'verified'])->name('file.details.show');

//delete Responsible
Route::get('file/details/{file_id}/delete/responsible', [TestFileController::class, 'deleteResponsible'])->middleware(['auth', 'verified'])->name('file.details.delete.responsible');
//delete investigator
Route::get('file/details/{file_id}/delete/investigator', [TestFileController::class, 'deleteInvestigator'])->middleware(['auth', 'verified'])->name('file.details.delete.investigator');


// create case
Route::get('case/{file_id}/create', [TestCaseController::class, 'create'])->middleware(['auth', 'verified'])->name('test.case.create');
// store case
Route::post('case/{file_id}/store', [TestCaseController::class, 'store'])->middleware(['auth', 'verified'])->name('test.case.store');

//create remark
Route::get('case/{case_id}/renark/create', [TestCaseController::class, 'remarkCreate'])->middleware(['auth', 'verified'])->name('remark.create');
// store remark
Route::post('case/{case_id}/renark/store', [TestCaseController::class, 'remarkStore'])->middleware(['auth', 'verified'])->name('remark.store');
// search 
Route::post('case/{case_no}', [TestCaseController::class, 'search'])->middleware(['auth', 'verified'])->name('search');

// create test case
// Route::get('test/case/')->middleware(['auth', 'verified'])->name('test.case.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';