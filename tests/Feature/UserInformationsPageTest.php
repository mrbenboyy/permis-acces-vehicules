<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Livewire\Livewire;
use Tests\TestCase;

class UserInformationsPageTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function can_view_user_information_page()
    {
        // Assurez-vous que l'utilisateur existe déjà dans votre base de données de test
        $user = User::where('email', 'admin@gmail.com')->firstOrFail();

        Livewire::test('user-informations-page', ['id' => $user->id])
            ->assertSee($user->nom_complet)
            ->assertSee($user->email);
    }

    /** @test */
    public function can_update_user_information()
    {
        $user = User::where('email', 'admin@gmail.com')->firstOrFail();

        Livewire::test('user-informations-page', ['id' => $user->id])
            ->set('nom_complet', 'Hakim')
            ->set('email', 'hakim@gmail.com')
            ->call('save')
            ->assertRedirect('/user/' . $user->id);

        // Vérifier que les informations ont été mises à jour dans la base de données
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nom_complet' => 'Hakim',
            'email' => 'hakim@gmail.com',
        ]);
    }
}
