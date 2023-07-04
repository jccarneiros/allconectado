<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Repositories\UserRepository;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;

    public string $search = '';

    protected string $paginationTheme = 'bootstrap';

    public function render(UserRepository $repository)
    {
        $data = $repository->searchByName('roles', $this->search);

        return view('livewire.dashboard.users.list-users', compact('data'))->layout('master');
    }
}
