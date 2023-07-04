<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Services\FlashMessage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserRepository extends AbstractRepository
{
    private Request $request;

    private FlashMessage $message;

    public function __construct(Request $request, FlashMessage $message)
    {
        $this->request = $request;
        $this->message = $message;
    }

    /**
     * @var string
     */
    protected static $model = User::class;

    protected static string $relations;

    public static function findByEmail(string $email): Builder|null
    {
        return self::loadModel()::query()->where(['email' => $email])->first();

    }

    public static function searchByName(string $relations, string $search): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return self::loadModel()::query()->with($relations)
            ->where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('email', 'LIKE', '%'.$search.'%')
            ->orderBy('id', 'asc')
            ->paginate(10);
    }

    public static function findByLastedCreated(): Builder|null
    {
        return self::loadModel()::query()->orderByDesc('id')->first();
    }

    public function onlyTrashedUser()
    {
        // Retorna os registros inativos
        return self::loadModel()::query()->onlyTrashed()->paginate(10);
    }

    public function restoreUser($id)
    {
        // Restaura o registro
        return self::loadModel()::query()->withTrashed()->findOrFail($id)->restore();

    }

    public function forceDeleteUser(): \Illuminate\Http\RedirectResponse
    {
        // Retorna o valor do input checkbox
        $delete = $this->request->input('delete');

        // Verifica se foi selecionado algum checkbox
        if ($this->request->input('delete')) {
            $deletes = self::loadModel()::query()->whereIn('id', $delete)->forceDelete();
        } else {
            $this->message->selectCheckbox();

            return redirect()->back();
        }

        // Verifica se foi selecionado mais de um checkbox
        if ($deletes) {
            $this->message->deleteMessageSuccess();

        } else {
            $this->message->deleteMessageError();

        }

        return redirect()->back();
    }
}
