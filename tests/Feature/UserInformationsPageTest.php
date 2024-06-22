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

}
