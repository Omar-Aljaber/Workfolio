<?php

use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

Route::controller(ProjectController::class)->middleware('auth')->group(function () {
    Route::get('/projects', 'index')->name('projects.index');
    Route::get('/projects/create', 'create')->name('projects.create');
    Route::post('/projects/create', 'store')->name('projects.store');
    Route::get('/projects/{project:id}', 'show')->name('projects.show');
});

Route::post('/subscribe', [NewsletterSubscriptionController::class, 'subscribe'])->name('newsletter.subscribe');

Route::controller(NewsletterController::class)->middleware('auth')->group(function () {
    Route::get('/newsletter', 'index')->name('admin.newsletter.index');
    Route::post('/newsletter/send', 'send')->name('admin.newsletter.send');
});

// Route::get('/test-smtp', function() {
//     try {
//         Mail::raw('Hostinger SMTP Test', function($message) {
//             $message->to('3mar.aljaber@gmail.com')
//                     ->subject('SMTP Test');
//         });
//         return 'Email sent successfully!';
//     } catch (\Exception $e) {
//         return 'Error: '.$e->getMessage();
//     }
// });

require __DIR__.'/auth.php';
