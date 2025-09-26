<?php

use App\Livewire\AboutPage;
use App\Livewire\HomePage;
use App\Livewire\ProjectPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get(uri: '/', action: HomePage::class)->name(name: 'homePage');
    Route::get(uri: '/projects', action: ProjectPage::class)->name(name: 'projects');
    Route::get(uri: '/about', action: AboutPage::class)->name(name: 'about');
});




Route::get(uri: 'set-locale/{lang}', action: function ($lang): RedirectResponse {
    if (in_array($lang, haystack: ['ar', 'en'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name(name: 'setLocale');
