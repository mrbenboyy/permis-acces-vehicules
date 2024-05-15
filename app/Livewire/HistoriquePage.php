<?php

namespace App\Livewire;

use App\Models\Historique;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('ONDA - Historique')]

class HistoriquePage extends Component
{
    use WithPagination;

    public $search_date;
    public $search_user;

    public $search_action;

    public $filter = false;

    protected $listeners = ['refreshHistorique' => '$refresh'];

    public function annuler()
    {
        $this->reset(['search_date', 'search_user', 'search_action']);
        $this->filter = false;
    }

    public function updating($field)
    {
        $this->resetPage(); // Reset pagination when any of the search parameters change
    }

    public function render()
    {
        $query = Historique::query();

        if ($this->search_date) {
            $query->where(function ($subQuery) {
                $subQuery->where('created_at', 'like', '%' . $this->search_date . '%')
                    ->orWhere('updated_at', 'like', '%' . $this->search_date . '%');
            });
            $this->filter = true;
        }

        if ($this->search_user) {
            $query->where('user_name', 'like', '%' . $this->search_user . '%');
            $this->filter = true;
        }

        if ($this->search_action) {
            $query->where('action', 'like', '%' . $this->search_action . '%');
            $this->filter = true;
        }

        $historique = $query->orderByDesc("created_at")->paginate(7);
        $user_name = User::get('nom_complet');

        return view('livewire.historique-page', [
            'historique' => $historique,
            'user_name' => $user_name
        ]);
    }

}
