<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;



Route::get('/', [DataController::class, 'showHome'])->name('anasayfa');

Route::get('/blog', [DataController::class, 'showBlogs'])->name('blog');

Route::get('/blog-detay', [DataController::class, 'singleBlogPage'])->name('blog-detay');

Route::get('/standart-sayfa', [DataController::class, 'singleDefaultPage'])->name('standart-sayfa');

Route::get('/hakkimizda', [DataController::class, 'singleAboutPage'])->name('hakkimizda');

Route::get('/musteri-yorumlari', [DataController::class, 'showTestimonials'])->name('musteri-yorumlari');

Route::get('/iletisim', [DataController::class, 'showContact'])->name('iletisim');

Route::get('/404', [DataController::class, 'showNotFound'])->name('bulunamadi');
