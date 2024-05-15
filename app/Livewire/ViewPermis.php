<?php

namespace App\Livewire;

use App\Models\Historique;
use App\Models\ListePermis;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('ONDA - Permis')]

class ViewPermis extends Component
{
    public $id;

    public function mout($id)
    {
        $this->id = $id;
    }

    public function supprimer($id)
    {
        $permis = ListePermis::where('id', $id)->firstOrFail();

        if ($permis) {
            try {
                $found_permis = $permis->delete();
                if ($found_permis) {
                    Historique::create([
                        'user_name' => auth()->user()->nom_complet,
                        'objet' => $permis->immatriculation,
                        'action' => 'Suppression'
                    ]);
                    session()->flash('success', 'Permis supprimé avec succès');
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Erreur de suppression du permis.');
            }
        }

        return redirect()->to(route('liste_permis'));
    }

    public function render()
    {
        return view('livewire.view-permis', [
            'permis' => ListePermis::where('id', $this->id)->firstOrFail()
        ]);
    }
}
