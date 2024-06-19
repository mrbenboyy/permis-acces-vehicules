<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\ListePermis;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PermisPageTest extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Fetch the existing user or create one if it doesn't exist
        $this->user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'nom_complet' => 'Admin',
                'password' => bcrypt('admin123'),
            ]
        );
    }

    /** @test */
    public function can_view_permis_page()
    {
        // Create some permis for testing
        for ($i = 1; $i <= 5; $i++) {
            ListePermis::create([
                'immatriculation' => 'ABC123' . $i,
                'proprietaire_chauffeur' => 'Proprietaire ' . $i,
                'numero' => '123456' . $i,
                'type_vehicule' => 'Renault',
                'type_permis' => 'captif',
                'annee_courante' => '2024',
                'date_expiration' => '2025-05-14',
                'raison_acces'=>'service',
                'zone_acces'=>'acces_1'
            ]);
        }

        Livewire::actingAs($this->user)
            ->test('App\Livewire\PermisPage')
            ->assertStatus(200)
            ->assertSee('ABC1231')
            ->assertSee('Proprietaire 1');
    }

    /** @test */
    public function can_create_permis()
    {
        Livewire::actingAs($this->user)
            ->test('App\Livewire\PermisFormPage')
            ->set('immatriculation', 'XYZ789')
            ->set('type_permis', 'Type 1')
            ->set('proprietaire_chauffeur', 'Proprietaire 1')
            ->set('type_vehicule', 'Type Vehicule 1')
            ->set('zone_acces', 'Zone 1')
            ->set('date_expiration', '2024-12-31')
            ->set('raison_acces', 'Raison 1')
            ->set('annee_courante', '2024')
            ->set('numero', '987654')
            ->call('save')
            ->assertRedirect(route('liste_permis'));

        $this->assertDatabaseHas('liste_permis', [
            'immatriculation' => 'XYZ789',
            'proprietaire_chauffeur' => 'Proprietaire 1',
            'numero' => '987654',
        ]);

        $this->assertDatabaseHas('historiques', [
            'user_name' => 'Admin User',
            'objet' => 'XYZ789',
            'action' => 'Création',
        ]);
    }

    /** @test */
    public function can_update_permis()
    {
        $permis = ListePermis::create([
            'immatriculation' => 'ABC123',
            'type_permis' => 'Type 1',
            'proprietaire_chauffeur' => 'Proprietaire 1',
            'type_vehicule' => 'Type Vehicule 1',
            'zone_acces' => 'Zone 1',
            'date_expiration' => '2024-12-31',
            'raison_acces' => 'Raison 1',
            'annee_courante' => '2024',
            'numero' => '123456',
        ]);

        Livewire::actingAs($this->user)
            ->test('App\Livewire\EditPermisPage', ['id' => $permis->id])
            ->set('immatriculation', 'DEF456')
            ->call('save')
            ->assertRedirect('/liste_permis/permis/' . $permis->id);

        $this->assertDatabaseHas('liste_permis', [
            'id' => $permis->id,
            'immatriculation' => 'DEF456',
        ]);

        $this->assertDatabaseHas('historiques', [
            'user_name' => 'Admin User',
            'objet' => 'DEF456',
            'action' => 'Modification',
        ]);
    }

    /** @test */
    public function can_delete_permis()
    {
        $permis = ListePermis::create([
            'immatriculation' => 'ABC123',
            'proprietaire_chauffeur' => 'Proprietaire 1',
            'numero' => '123456',
        ]);

        Livewire::actingAs($this->user)
            ->test('App\Livewire\PermisPage')
            ->call('delete', $permis->id)
            ->assertSee('Archivé avec succès!');

        $this->assertDatabaseMissing('liste_permis', [
            'id' => $permis->id,
        ]);

        $this->assertDatabaseHas('historiques', [
            'user_name' => 'Admin User',
            'objet' => 'ABC123',
            'action' => 'Archivage',
        ]);
    }

    /** @test */
    public function can_view_permis_details()
    {
        $permis = ListePermis::create([
            'immatriculation' => 'ABC123',
            'proprietaire_chauffeur' => 'Proprietaire 1',
            'numero' => '123456',
        ]);

        Livewire::actingAs($this->user)
            ->test('App\Livewire\ViewPermis', ['id' => $permis->id])
            ->assertStatus(200)
            ->assertSee('ABC123')
            ->assertSee('Proprietaire 1');
    }
}
