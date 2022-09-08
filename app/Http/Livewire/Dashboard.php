<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $form = [
        'user1' => '',
        'user2' => '',
        'date1' => '',
        'date2' => '',
    ];

    public function render()
    {
        return view('livewire.dashboard');
    }
}
