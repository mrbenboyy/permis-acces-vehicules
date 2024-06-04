<?php

namespace App\Livewire;

use App\Models\Historique;
use App\Models\ListePermis;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("ONDA - Liste Permis")]

class PermisPage extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $search;
    public function delete($id)
    {
        $permis = ListePermis::find($id);

        if ($permis) {
            $found_permis = $permis->delete();
            if ($found_permis) {
                Historique::create([
                    'user_name' => auth()->user()->nom_complet,
                    'objet' => $permis->immatriculation,
                    'action' => 'Archivage'
                ]);
            }
        }

        $this->alert('success', 'Archivé avec succès!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination when the search query changes
    }


    public function render()
    {
        $query = ListePermis::query();

        if ($this->search) {
            $query->where('immatriculation', 'like', '%' . $this->search . '%')
                ->orWhere('proprietaire_chauffeur', 'like', '%' . $this->search . '%')
                ->orWhere('numero', 'like', '%' . $this->search . '%');
        }

        $permis = $query->orderByDesc('created_at')->paginate(5);

        return view('livewire.permis-page', [
            'permis' => $permis,
        ]);
    }
}
