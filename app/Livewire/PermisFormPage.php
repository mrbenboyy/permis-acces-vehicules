<?php

namespace App\Livewire;

use App\Models\Historique;
use App\Models\ListePermis;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Log;


#[Title('ONDA - Ajouter Permis')]
class PermisFormPage extends Component
{
    public $immatriculation;
    public $type_permis;
    public $proprietaire_chauffeur;
    public $type_vehicule;
    public $zone_acces;
    public $date_expiration;
    public $raison_acces;
    public $annee_courante;
    public $numero;

    public function save()
    {
        $permis = $this->validate([
            "immatriculation" => "required|unique:liste_permis,immatriculation",
            "type_permis" => "required",
            "proprietaire_chauffeur" => "required",
            "type_vehicule" => "required",
            "zone_acces" => "required",
            "date_expiration" => "required",
            "raison_acces" => "required",
            "annee_courante" => "required",
            "numero" => "required|unique:liste_permis,numero",
        ]);

        try {
            $permisRecord = ListePermis::create($permis);

            if ($permisRecord) {
                $historiqueRecord = Historique::create([
                    'user_name' => auth()->user()->nom_complet,
                    'objet' => $permisRecord->immatriculation,
                    'action' => 'Création'
                ]);

                if ($historiqueRecord) {
                    session()->flash('success', 'Permis créé avec succès!');
                } else {
                    session()->flash('error', 'Historique pas créé');
                }
            } else {
                session()->flash('error', 'ListePermis pas créé');
            }
        } catch (\Exception $e) {
            Log::error('Error creating permis or historique: ' . $e->getMessage());

            session()->flash('error', 'Une erreur est survenue: ' . $e->getMessage());
        }

        return redirect()->to(route('liste_permis'));
    }


    public function annuler()
    {
        $this->immatriculation = "";
        // $this->type_permis = "";
        $this->proprietaire_chauffeur = "";
        $this->type_vehicule = "";
        $this->zone_acces = "";
        $this->date_expiration = null;
        $this->raison_acces = "";
        $this->annee_courante = null;
        $this->numero = null;
    }

    public function render()
    {
        return view('livewire.permis-form-page');
    }
}
