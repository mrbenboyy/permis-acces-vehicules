<?php

namespace App\Livewire;

use App\Models\ListePermis;
use Livewire\Attributes\Title;
use Livewire\Component;

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
            "immatriculation" => "required",
            "type_permis" => "required",
            "proprietaire_chauffeur" => "required",
            "type_vehicule" => "required",
            "zone_acces" => "required",
            "date_expiration" => "required",
            "raison_acces" => "required",
            "annee_courante" => "required",
            "numero" => "required",
        ]);
        try {
            ListePermis::create($permis);
            session()->flash('success', 'créé');
        } catch (\Exception $e) {
            session()->flash('error', 'pas créé');
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
