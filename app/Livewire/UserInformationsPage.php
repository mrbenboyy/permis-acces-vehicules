<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserInformationsPage extends Component
{
    public $id;
    public $nom_complet;
    public $email;
    public $password;

    public function mount($id)
    {
        $this->id = $id;
        $user = User::where('id', $id)->firstOrFail();
        if ($user) {
            $this->nom_complet = $user->nom_complet;
            $this->email = $user->email;
        }
    }

    public function save()
    {
        $rules = [
            'nom_complet' => 'required',
            'email' => 'required|unique:users,email,' . $this->id,
        ];

        // Conditionally add password validation rule if it's provided
        if (!empty($this->password)) {
            $rules['password'] = 'nullable|min:6|max:255';
        }

        $validatedData = $this->validate($rules);

        try {
            $user = User::find($this->id);
            $user->update($validatedData);
            session()->flash('success', 'vos informations ont été modifiées avec succès!');
            return redirect()->to(('/user/' . $this->id));
        } catch (\Exception $e) {
            session()->flash('error', "Échec de la modification de vos informations. Veuillez réessayer.");
        }
    }

    public function render()
    {
        $user = User::where('id', $this->id)->firstOrFail();
        return view('livewire.user-informations-page', [
            'user' => $user
        ]);
    }
}
