<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Setting;
use Livewire\Component;

class ProjectPage extends Component
{
    public function render()
    {
        return view('livewire.project-page', [
            'project' => Project::all(),
            'settings' => Setting::first()
        ]);
    }
}
