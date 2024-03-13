<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\MailController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[ItemController::class,'index']);

Route::get('/item/{id}',[ItemController::class,'item']);

Route::get('/search',[ItemController::class,'search'])->name('search');

Route::middleware('auth')->group(function(){
    Route::get('/sell',[ItemController::class,'sell']);
    Route::post('/listing',[ItemController::class,'store']);
    Route::get('/like_list',[ItemController::class,'like_list'])->name('like_list');
    Route::get('/mypage',[MypageController::class,'mypage']);
    Route::get('/mypage/profile',[MypageController::class,'profile']);
    Route::patch('/mypage/profile_update',[MypageController::class,'update']);
    Route::get('/purchase_list', [MypageController::class, 'purchase_list'])->name('purchase_list');
    Route::get('/nice/{id}',[LikeController::class,'nice'])->name('nice');
    Route::get('/unnice/{id}', [LikeController::class, 'unnice'])->name('unnice');
    Route::get('/purchase/{id}',[PurchaseController::class,'purchase']);
    Route::post('/purchase/purchase_store',[PurchaseController::class,'purchase_store']);
    Route::get('/purchase/purchase_done',[PurchaseController::class,'purchase_done']);
    Route::get('/comment/{id}',[CommentController::class,'comment']);
    Route::post('/comment_store',[CommentController::class,'comment_store']);
    Route::get('/comment/delete/{id}', [CommentController::class, 'comment_destroy'])->name('comment_destroy');
    Route::get('/manage',[ManageController::class,'manage']);
    Route::get('/manage/search',[ManageController::class,'user_search'])->name('user_search');
    Route::get('/manage/introduction/{id}',[ManageController::class,'introduction'])->name('introduction');
    Route::get('/manage/authority/{id}', [ManageController::class, 'authority'])->name('authority');
    Route::get('/manage/staff_store/{id}', [ManageController::class, 'staff_store'])->name('staff_store');
    Route::get('/manage/staff_destroy/{id}', [ManageController::class, 'staff_destroy'])->name('staff_destroy');
    Route::get('/manage/delete/{id}',[ManageController::class,'user_destroy'])->name('user_destroy');
    Route::get('/manage/restoration/{id}', [ManageController::class, 'user_restoration'])->name('user_restoration');
    Route::get('/manage/force-delete/{id}', [ManageController::class, 'user_forcedelete'])->name('user_forcedelete');
    Route::get('/mail/{id}',[MailController::class,'mail']);
    Route::post('/mail_send',[MailController::class,'send']);
});