<?php

namespace App\Livewire;

use App\Models\ListePermis;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("ONDA - Liste Permis")]

class PermisPage extends Component
{
    use LivewireAlert;

    public $search;
    public function delete($id)
    {
        $permis = ListePermis::find($id);

        if ($permis) {
            $permis->delete();
        }

        $this->alert('success', 'Supprimé avec succès!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $query = ListePermis::query();

        if ($this->search) {
            $query->where('immatriculation', 'like', '%' . $this->search . '%')
                ->orWhere('proprietaire_chauffeur', 'like', '%' . $this->search . '%')
                ->orWhere('type_permis', 'like', '%' . $this->search . '%')
                ->orWhere('numero', 'like', '%' . $this->search . '%');
        }

        $permis = $query->orderByDesc('created_at')->get();

        return view('livewire.permis-page', [
            'permis' => $permis,
        ]);
    }
}
