<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Bienvenue')]

class HomePage extends Component
{
    public function render()
    {
        $name = auth()->user()->nom_complet;
        return view('livewire.home-page', [
            'nom_complet' => $name
        ]);
    }
}
