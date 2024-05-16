<?php

namespace App\Livewire;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('ONDA - Utilisateurs')]

class UserPage extends Component
{
    use LivewireAlert;
    public $nom_complet;
    public $email;
    public $password;
    public $role;
    public $id_user;
    public function save()
    {
        // If id_user is set, it means we are updating an existing user
        if ($this->id_user) {
            $rules = [
                'nom_complet' => 'required',
                'email' => 'required|unique:users,email,' . $this->id_user,
                'role' => 'required'
            ];

            // Conditionally add password validation rule if it's provided
            if (!empty($this->password)) {
                $rules['password'] = 'nullable|min:6|max:255';
            }

            $validatedData = $this->validate($rules);

            try {
                $user = User::find($this->id_user);
                $user->update($validatedData);
                session()->flash('success_update', 'Utilisateur modifié avec succès!');
                $this->reset();

                $this->alert('success', 'Modifié avec succès!', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);
            } catch (\Exception $e) {
                session()->flash('error', "Échec de la modification de l'utilisateur. Veuillez réessayer.");
            }
        } else {
            // If id_user is not set, it means we are creating a new user
            $validatedData = $this->validate([
                'nom_complet' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6|max:255',
                'role' => 'required'
            ]);

            try {
                User::create($validatedData);
                session()->flash('success', 'Utilisateur créé avec succès!');
                $this->reset();

                $this->alert('success', 'ajouté avec succès!', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);
            } catch (\Exception $e) {
                session()->flash('error', "Échec de la création de l'utilisateur. Veuillez réessayer.");
            }
        }

        return redirect()->to(route('users'));
    }




    public function resetForm()
    {
        $this->nom_complet = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->id_user = null;
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }

        $this->alert('success', 'Supprimé avec succès!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            $this->nom_complet = $user->nom_complet;
            $this->email = $user->email;
            $this->role = $user->role;
            $this->id_user = $id;
        }
    }

    public function update()
    {

        return redirect()->to(route('users'));
    }

    public function render()
    {
        $users = User::where('email', '!=', 'admin@gmail.com')->get();
        return view('livewire.user-page', [
            'users' => $users
        ]);
    }
}
