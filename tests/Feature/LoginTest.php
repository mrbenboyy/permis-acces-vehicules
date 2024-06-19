<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function can_login_with_valid_credentials()
    {
        $existingEmail = 'admin@gmail.com';
        $existingPassword = 'admin123';

        // Tester la connexion avec ces identifiants
        Livewire::test('auth.login')
            ->set('email', $existingEmail)
            ->set('password', $existingPassword)
            ->set('captcha', 'valid_token')
            ->call('save')
            ->assertRedirect(route('home'));
    }
}
