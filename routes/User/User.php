<?php
Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('index');

Route::get('/my-account',            [App\Http\Controllers\User\DashboardController::class, 'DetailInformation'])->name('detail-information');
/**
 * Route for Wishlist
 
 */
Route::get('/wishlist',              [App\Http\Controllers\User\WishlistController::class, 'index'])->name('wishlist')->middleware(['auth', 'user', 'status']);
Route::post('/wishlist',             [App\Http\Controllers\User\WishlistController::class, 'store'])->name('wishlist.store')->middleware(['auth', 'user', 'status']);
Route::delete('/wishlist',           [App\Http\Controllers\User\WishlistController::class, 'destroy'])->name('wishlist.destroy')->middleware(['auth', 'user', 'status']);
