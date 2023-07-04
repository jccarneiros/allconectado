<?php

namespace App\Services;

use App\DTO\CreateUserDTO;
use stdClass;

class UserService
{
    protected $repository;

    public function __construct()
    {
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function edit(string $id): stdClass|null
    {
        return $this->repository->edit($id);
    }

    public function store(CreateUserDTO $dto): stdClass
    {
        return $this->repository->store($dto);
    }

    public function update(string $name, string $email, string $password, string $id): stdClass|null
    {
        return $this->repository->update($name, $email, $password, $id);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
