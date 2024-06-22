<?php

namespace Tests\Feature;

use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class PermisFormPageTest extends TestCase
{

    /** @test */
    public function can_create_a_permis_with_existing_user()
    {
        // Récupérer l'utilisateur existant
        $user = User::where('email', 'admin@gmail.com')->firstOrFail();

        Livewire::actingAs($user)
            ->test('permis-form-page')
            ->set('immatriculation', '124 - A - 14')
            ->set('type_permis', 'captif')
            ->set('proprietaire_chauffeur', 'John Doe')
            ->set('type_vehicule', 'BMW')
            ->set('zone_acces', 'acces_1')
            ->set('date_expiration', '2025-12-31')
            ->set('raison_acces', 'Service')
            ->set('annee_courante', 2024)
            ->set('numero', 2)
            ->call('save')
            ->assertRedirect(route('liste_permis'));

        // Vérifier que le permis a été correctement enregistré dans la base de données
        $this->assertDatabaseHas('liste_permis', [
            'immatriculation' => '124 - A - 14',
            'type_permis' => 'captif',
            'proprietaire_chauffeur' => 'John Doe',
            'type_vehicule' => 'BMW',
            'zone_acces' => 'acces_1',
            'date_expiration' => '2025-12-31',
            'raison_acces' => 'Service',
            'annee_courante' => 2024,
            'numero' => 2,
        ]);
    }
}
