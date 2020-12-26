<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;
use Livewire\WithPagination;

class RolesTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.roles-table',['roles' => Role::paginate(5)]);
    }
}
