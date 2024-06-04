<?php

namespace App\Livewire;

use App\Models\Historique;
use App\Models\ListePermis;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Archive extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $search;

    public function delete($id)
    {
        $permis = ListePermis::withTrashed()->find($id);

        if ($permis && $permis->trashed()) {
            $found_permis = $permis->forceDelete();
            if ($found_permis) {
                Historique::create([
                    'user_name' => auth()->user()->nom_complet,
                    'objet' => $permis->immatriculation,
                    'action' => 'Suppression'
                ]);
            }

            $this->alert('success', 'Supprimé avec succès!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Échec de la suppression!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function restore($id)
    {
        $permis = ListePermis::withTrashed()->find($id);
        if ($permis && $permis->trashed()) {
            $found_permis = $permis->restore();
            if ($found_permis) {
                Historique::create([
                    'user_name' => auth()->user()->nom_complet,
                    'objet' => $permis->immatriculation,
                    'action' => 'Restauration'
                ]);

                $this->alert('success', 'Restauré avec succès!', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);
            } else {
                $this->alert('error', 'Échec de la restauration!', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);
            }
        }
    }

    public function restore_all()
    {
        $permis = ListePermis::onlyTrashed()->restore();

        if ($permis) {
            Historique::create([
                'user_name' => auth()->user()->nom_complet,
                'objet' => "Tous les permis",
                'action' => 'Restauration de tous les permis'
            ]);

            $this->alert('success', 'Tout restauré avec succès!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function delete_all()
    {
        $permis = ListePermis::onlyTrashed()->forceDelete();

        if ($permis) {
            Historique::create([
                'user_name' => auth()->user()->nom_complet,
                'objet' => "Tous les permis",
                'action' => 'Suppression de tous les permis'
            ]);

            $this->alert('success', 'Supprimé avec succès!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        $query = ListePermis::onlyTrashed();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('immatriculation', 'like', '%' . $this->search . '%')
                    ->orWhere('proprietaire_chauffeur', 'like', '%' . $this->search . '%')
                    ->orWhere('numero', 'like', '%' . $this->search . '%');
            });
        }

        $permis = $query->orderByDesc('created_at')->paginate(5);

        return view('livewire.archive', [
            'permis' => $permis
        ]);
    }
}
