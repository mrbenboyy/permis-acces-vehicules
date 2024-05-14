<?php

namespace App\Livewire;

use App\Models\Historique;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('ONDA - Historique')]

class HistoriquePage extends Component
{
    use WithPagination;

    public function render()
    {
        $historique = Historique::orderByDesc("created_at")->paginate(5);
        return view('livewire.historique-page', [
            'historique' => $historique
        ]);
    }
}
