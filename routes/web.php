<?php

use App\Livewire\AboutPage;
use App\Livewire\HomePage;
use App\Livewire\ProjectPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('homePage');
Route::get('/projects', ProjectPage::class)->name('projects');
Route::get('abouts', AboutPage::class)->name('about');
