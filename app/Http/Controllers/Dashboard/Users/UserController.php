<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreFormRequest;
use App\Http\Requests\UserUpdateFormRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\FlashMessage;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private string $view = 'users';

    private Request $request;

    private FlashMessage $message;

    private UserRepository $repository;

    public function __construct(UserRepository $repository, Request $request, FlashMessage $message)
    {
        $this->request = $request;
        $this->message = $message;
        $this->repository = $repository;
    }

    /**
     * @throws AuthorizationException
     */
    public function index(): View
    {
        if ($this->request->user()->cannot('users.index', User::class)) {
            abort(403, 'Ação não autorizada!');
        }

        return view("dashboard.{$this->view}.index");
    }

    public function create(): View
    {
        if ($this->request->user()->cannot('users.create', User::class)) {
            abort(403, 'Ação não autorizada!');
        }

        $roles = DB::table('roles')->select('id', 'name')
            ->orderBy('id', 'asc')->get();

        $permissions = DB::table('permissions')->select('id', 'name', 'slug')
            ->orderBy('id', 'asc')->get();

        return view("dashboard.{$this->view}.create", compact('roles', 'permissions'));
    }

    public function store(UserStoreFormRequest $formRequest): RedirectResponse
    {
        if ($this->request->user()->cannot('users.create', User::class)) {
            abort(403, 'Ação não autorizada!');
        }

        // Insere os dados do formulário no banco de dados
        $insert = $this->repository->create([
            'name' => nameCase($formRequest['name']),
            'email' => $formRequest['email'],
        ]);

        // Atualizar roles
        $insert->roles()->sync($this->request->get('roles'));

        // Atualizar permissions
        $insert->permissions()->sync($this->request->get('permissions'));

        if ($insert) {
            $this->message->storeMessageSuccess();

        } else {
            $this->message->storeMessageError();

        }

        return redirect()->route('dashboard.users.create');

    }

    public function edit($id): View
    {
        if ($this->request->user()->cannot('users.edit', User::class)) {
            abort(403, 'Ação não autorizada!');
        }

        $item = $this->repository->find($id);

        $roles = DB::table('roles')->select('id', 'name')->orderBy('id', 'asc')->get();

        $permissions = DB::table('permissions')->select('id', 'name', 'slug')->get();

        return view("dashboard.{$this->view}.edit", compact('item', 'roles', 'permissions'));
    }

    public function update(UserUpdateFormRequest $formRequest, $id): RedirectResponse
    {
        if ($this->request->user()->cannot('users.edit', User::class)) {
            abort(403, 'Ação não autorizada!');
        }

        $item = $this->repository->find($id);

        $update = $this->repository->update($item->id, [
            'name' => nameCase($formRequest['name']),
            'email' => $formRequest['email'],
        ]);

        // Atualizar roles
        $item->roles()->sync($this->request->get('roles'));
        // Atualizar permissions
        $item->permissions()->sync($this->request->get('permissions'));

        if ($update) {
            $this->message->updateMessageSuccess();

        } else {
            $this->message->updateMessageError();

        }

        return redirect()->route('dashboard.users.edit', ['id' => $id]);
    }

    public function destroy($id): RedirectResponse
    {
        if ($this->request->user()->cannot('users.delete', User::class)) {
            abort(403, 'Ação não autorizada!');
        }

        $item = $this->repository->find($id);

        $inactive = $this->repository->delete($item->id);

        if ($inactive) {
            $this->message->inactiveSuccess();

        } else {
            $this->message->inactiveError();

        }

        return redirect()->back();
    }

    public function onlyTrashed(): View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if ($this->request->user()->cannot('users.onlyTrashed', User::class)) {
            abort(403, 'Ação não autorizada!');
        }

        $data = $this->repository->onlyTrashedUser();

        return view("dashboard.{$this->view}.inativos.index", compact('data'));
    }

    public function restore($id): RedirectResponse
    {
        if ($this->request->user()->cannot('users.restore', User::class)) {
            abort(403, 'Ação não autorizada!');
        }
        $restore = $this->repository->restoreUser($id);

        if ($restore) {
            $this->message->restoreMessageSuccess();

        } else {
            $this->message->restoreMessageError();

        }

        return redirect()->back();
    }

    public function forceDelete(): RedirectResponse
    {
        if ($this->request->user()->cannot('users.forceDelete', User::class)) {
            abort(403, 'Ação não autorizada!');
        }

        return $this->repository->forceDeleteUser();

    }
}
