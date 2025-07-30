<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

Route::get('/greeting/{locale}', function (string $locale) {
    if (! in_array($locale, ['ar', 'en'])) {
        abort(400, 'Invalid Language');
    }
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('changeLang');

Route::get('/', function () {
    return redirect('projects');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:id}', [ProjectController::class, 'show'])->name('projects.show');

Route::controller(ProjectController::class)->middleware('auth')->group(function () {
    Route::get('/project/create', 'create')->name('projects.create');
    Route::post('/project/create', 'store')->name('projects.store');
});

Route::post('/subscribe', [NewsletterSubscriptionController::class, 'subscribe'])->name('newsletter.subscribe');

Route::controller(NewsletterController::class)->middleware('auth')->group(function () {
    Route::get('/newsletter', 'index')->name('newsletter.index');
    Route::post('/newsletter/send', 'send')->name('newsletter.send');
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

require __DIR__ . '/auth.php';
