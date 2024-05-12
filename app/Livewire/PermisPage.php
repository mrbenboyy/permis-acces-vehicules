<?php

namespace App\Livewire;

use App\Models\ListePermis;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("ONDA - Liste Permis")]

class PermisPage extends Component
{
    public function render()
    {
        $permis = ListePermis::all();
        return view('livewire.permis-page', [
            'permis' => $permis
        ]);
    }
}
