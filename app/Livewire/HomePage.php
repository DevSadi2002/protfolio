<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Setting;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'setting' => Setting::first(),
            'project' => Project::where('is_important', true)->take(4)->get()
        ]);
    }
}
