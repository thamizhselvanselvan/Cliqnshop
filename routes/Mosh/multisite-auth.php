<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;







    



Route::middleware('auth')->group(function () {

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');
               
                Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');
            
            Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

            
    

    
});


Route::middleware('guest')->group(function () {

   
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');
    
    
    
   
 });
           