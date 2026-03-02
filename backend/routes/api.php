<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThongKeController;
use Illuminate\Support\Facades\Route;

// LIBRARIAN
//Sach


Route::get('librarian/sach/get-data', [BookController::class, 'getAllSach']);
Route::post('/librarian/sach/add-data', [BookController::class, 'addDataSach']);
Route::post('/librarian/sach/update-data/{book}', [BookController::class, 'updateDataSach']);
Route::delete('/librarian/sach/delete-data/{book}', [BookController::class, 'deleteDataSach']);
Route::post('/librarian/sach/search', [BookController::class, 'searchSach']);
Route::get('/librarian/category/get-data', [BookController::class, 'getAllCategory']);
Route::get('/librarian/author/get-data', [BookController::class, 'getAllAuthor']);


Route::get('/librarian/borrow-request/get-data', [BorrowRequestController::class, 'getAllBorrowRequest']);
Route::post('/librarian/borrow-request/update-data/{borrowRequest}', [BorrowRequestController::class, 'approveBorrowRequest']);
Route::post('/librarian/borrow-request/reject-data/{borrowRequest}', [BorrowRequestController::class, 'rejectBorrowRequest']);

// STUDENT
Route::get('/student/home/books', [HomeController::class, 'getDataClientSachByCategory']);
Route::get('/student/home/categories', [HomeController::class, 'getDataClientCategory']);
Route::middleware('auth:sanctum')->post(
    '/student/borrow-request/add-data',
    [HomeController::class, 'addBorrowRequest']
);
Route::post('/student/books/search', [HomeController::class, 'searchBooks']);

//Admin
Route::get('/admin/thongke/summary', [ThongKeController::class, 'getSummaryData']);
Route::get('/admin/thongke/recent-borrow', [ThongKeController::class, 'getRecentBorrowData']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/auth/me', [AuthController::class, 'me']);
  Route::post('/auth/logout', [AuthController::class, 'logout']);
});
