<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Navbar extends Component
{


    // change image2wbmp()
    public function render(): View
    {

        return view(view: 'livewire.navbar');
    }
}
