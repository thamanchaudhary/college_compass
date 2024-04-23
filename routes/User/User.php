<?php
Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('index');

Route::get('/my-account',            [App\Http\Controllers\User\DashboardController::class, 'DetailInformation'])->name('detail-information');
// User Information Show
Route::get('/my-account/show',       [App\Http\Controllers\User\DashboardController::class, 'ShowInformation'])->name('ShowInformation');
// User WishList Show
Route::get('/my-account/wishlist',    [App\Http\Controllers\User\DashboardController::class, 'ShowWishlist'])->name('ShowWishlist');

// User Recomamded College with Program and Location
Route::get('/my-account/recomamded-college', [App\Http\Controllers\User\DashboardController::class, 'RecommendedCollege'])->name('RecommendedCollege');


Route::post('/change-password',                    [App\Http\Controllers\User\DashboardController::class, 'passwordChange'])->name('user_profile.passwordChange');

Route::post('/update-profile',                     [App\Http\Controllers\User\DashboardController::class, 'updateProfile'])->name('user_profile.updateProfile');

/**
 * Route for Wishlist
 
 */
Route::get('/wishlist',              [App\Http\Controllers\User\WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist-store',        [App\Http\Controllers\User\WishlistController::class, 'store'])->name('wishlist-store');
Route::delete('/wishlist',           [App\Http\Controllers\User\WishlistController::class, 'destroy'])->name('wishlist.destroy');
