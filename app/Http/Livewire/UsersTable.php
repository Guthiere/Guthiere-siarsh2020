<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    protected $queryString=[
        'search'=>['except'=>''],
        'usrPerPage'=>['except'=>'5']
    ];

    public $search = '';
    public $usrPerPage ='5';

    public function render()
    {
        return view('livewire.users-table',[
            'users' => User::where('name','LIKE',"%{$this->search}%")
                            ->orWhere('email','LIKE',"%{$this->search}%")
                            ->paginate($this->usrPerPage)]);
    }

    public function clear(){
        $this->search = '';
        $this->page = 1;
        $this->usrPerPage ='5';
    }
}
