<?php
Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('index');

Route::get('/my-account',            [App\Http\Controllers\User\DashboardController::class, 'DetailInformation'])->name('detail-information');
