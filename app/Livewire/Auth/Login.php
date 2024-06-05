<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Connexion")]

class Login extends Component
{
    public $email;
    public $password;

    // ...

    public $captcha = null;

    public function updatedCaptcha($token)
    {
        $response = Http::post(
            'https://www.google.com/recaptcha/api/siteverify?secret=' .
                env('CAPTCHA_SECRET_KEY') .
                '&response=' . $token
        );

        $success = $response->json()['success'];

        if (!$success) {
            throw ValidationValidationException::withMessages([
                'captcha' => __('Google thinks, you are a bot, please refresh and try again!'),
            ]);
        }
    }

    // validate the captcha rule
    protected function rules()
    {
        return [
            'captcha' => ['required'],
            // ...
        ];
    }

    // ...
    public function save()
    {
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:6|max:255',
            'captcha' => 'required',
        ]);

        if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('error', "les informations d'identification invalides");
            return;
        }

        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
