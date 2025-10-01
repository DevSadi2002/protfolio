<?php

use App\Livewire\AboutPage;
use App\Livewire\HomePage;
use App\Livewire\ProjectPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// Set Arabic as the default locale
Route::get('/', function () {
    return redirect(LaravelLocalization::getLocalizedURL('ar'));
});

Route::group(attributes: ['prefix' => LaravelLocalization::setLocale()], routes: function (): void {
    Route::get(uri: '/', action: HomePage::class)->name(name: 'homePage');
    Route::get(uri: '/projects', action: ProjectPage::class)->name(name: 'projects');
    Route::get(uri: '/about', action: AboutPage::class)->name(name: 'about');
});
// clear cache
Route::get(uri: '/clear-cache', action: function (): RedirectResponse {
    $exitCode = Artisan::call(command: 'config:clear');
    $exitCode = Artisan::call(command: 'cache:clear');
    $exitCode = Artisan::call(command: 'view:clear');
    $exitCode = Artisan::call(command: 'route:clear');
    return back();
})->name(name: 'clear.cache');
