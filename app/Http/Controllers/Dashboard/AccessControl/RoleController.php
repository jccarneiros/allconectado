<?php

namespace App\Http\Controllers\Dashboard\AccessControl;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreFormRequest;
use App\Http\Requests\RoleUpdateFormRequest;
use App\Models\Dashboard\AccessControl\Role;
use App\Repositories\RoleRepository;
use App\Services\FlashMessage;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    private string $view = 'roles';

    private Request $request;

    private FlashMessage $message;

    private RoleRepository $repository;

    public function __construct(RoleRepository $repository, Request $request, FlashMessage $message)
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
        if ($this->request->user()->cannot('roles.index', Role::class)) {
            abort(403, 'Ação não autorizada!');
        }

        $data = $this->repository->all();

        return view("dashboard.{$this->view}.index", compact('data'));
    }

    public function store(RoleStoreFormRequest $formRequest): RedirectResponse
    {
        if ($this->request->user()->cannot('roles.create', Role::class)) {
            abort(403, 'Ação não autorizada!');
        }

        // Insere os dados do formulário no banco de dados
        $insert = $this->repository->create([
            'name' => nameCase($formRequest['name']),
        ]);

        if ($insert) {
            $this->message->storeMessageSuccess();

        } else {
            $this->message->storeMessageError();

        }

        return redirect()->back();
    }

    public function edit($id): View
    {
        if ($this->request->user()->cannot('roles.edit', Role::class)) {
            abort(403, 'Ação não autorizada!');
        }

        $item = $this->repository->find($id);

        $permissions = DB::table('permissions')->select('id', 'name', 'slug')
            ->orderBy('id', 'asc')->get();

        return view("dashboard.{$this->view}.edit", compact('item', 'permissions'));
    }

    public function update(RoleUpdateFormRequest $formRequest, $id): RedirectResponse
    {
        if ($this->request->user()->cannot('roles.edit', Role::class)) {
            abort(403, 'Ação não autorizada!');
        }

        $item = $this->repository->find($id);

        $update = $this->repository->update($item->id, [
            'name' => nameCase($formRequest['name']),
        ]);

        // Atualizar permissions
        $item->permissions()->sync($this->request->get('permissions'));

        if ($update) {
            $this->message->updateMessageSuccess();

        } else {
            $this->message->updateMessageError();

        }

        return redirect()->route('dashboard.roles.edit', ['id' => $id]);
    }

    public function destroy($id): RedirectResponse
    {
        if ($this->request->user()->cannot('roles.delete', Role::class)) {
            abort(403, 'Ação não autorizada!');
        }

        $item = $this->repository->find($id);

        $destroy = $this->repository->delete($item->id);

        if ($destroy) {
            $this->message->destroyMessageSuccess();

        } else {
            $this->message->destroyMessageError();

        }

        return redirect()->back();
    }
}
