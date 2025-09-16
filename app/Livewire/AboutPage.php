<?php

namespace App\Livewire;

use App\Models\About;
use App\Models\Setting;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('about page - Dev.Sadi')]
class AboutPage extends Component
{
    public function render()
    {

        return view('livewire.about-page', [
            'settings' => Setting::first(),
            'profile' => About::first(),
        ]);
    }
}
