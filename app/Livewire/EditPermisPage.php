<?php

namespace App\Livewire;

use App\Models\Historique;
use App\Models\ListePermis;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("ONDA - Modifier Permis")]

class EditPermisPage extends Component
{
    public $id;
    public $immatriculation;
    public $type_permis;
    public $proprietaire_chauffeur;
    public $type_vehicule;
    public $zone_acces;
    public $date_expiration;
    public $raison_acces;
    public $annee_courante;
    public $numero;
    public $type;

    public function mount($id)
    {
        $this->id = $id;
        $permis = ListePermis::where('id', $id)->firstOrFail();
        if ($permis) {
            $this->immatriculation = $permis->immatriculation;
            $this->type = $permis->type_permis;
            $this->proprietaire_chauffeur = $permis->proprietaire_chauffeur;
            $this->zone_acces = $permis->zone_acces;
            $this->date_expiration = $permis->date_expiration;
            $this->raison_acces = $permis->raison_acces;
            $this->annee_courante = $permis->annee_courante;
            $this->numero = $permis->numero;
            $this->type_vehicule = $permis->type_vehicule;
        }
    }

    public function save()
    {
        $this->validate([
            "immatriculation" => "required|unique:liste_permis,immatriculation," . $this->id,
            "type" => "required",
            "proprietaire_chauffeur" => "required",
            "type_vehicule" => "required",
            "zone_acces" => "required",
            "date_expiration" => "required",
            "raison_acces" => "required",
            "annee_courante" => "required",
            "numero" => "required|unique:liste_permis,numero," . $this->id,
        ]);

        try {
            $permis = ListePermis::where('id', $this->id)->firstOrFail();
            if ($permis) {
                $updated_permis = $permis->update([
                    'immatriculation' => $this->immatriculation,
                    'type_permis' => $this->type,
                    'proprietaire_chauffeur' => $this->proprietaire_chauffeur,
                    'type_vehicule' => $this->type_vehicule,
                    'zone_acces' => $this->zone_acces,
                    'date_expiration' => $this->date_expiration,
                    'raison_acces' => $this->raison_acces,
                    'annee_courante' => $this->annee_courante,
                    'numero' => $this->numero,
                ]);

                if ($updated_permis) {
                    Historique::create([
                        'user_name' => auth()->user()->nom_complet,
                        'objet' => $permis->immatriculation,
                        'action' => 'Modification'
                    ]);
                }
            }
            session()->flash('success', 'Permis modifié avec succès!');
            return redirect()->to('/permis/' . $this->id);
        } catch (\Exception $e) {
            session()->flash('error', "Échec de la création du permis. Veuillez réessayer.");
        }

    }

    public function render()
    {
        return view('livewire.edit-permis-page', [
            'permis' => ListePermis::where('id', $this->id)->first()
        ]);
    }
}
