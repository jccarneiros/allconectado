<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Dashboard\AccessControl\Role;

class RoleRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected static $model = Role::class;

    public static function searchByName(string $relations, string $search): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return self::loadModel()::query()->with($relations)
            ->where('name', 'LIKE', '%'.$search.'%')
            ->orderBy('name', 'asc')
            ->paginate(15);
    }
}
