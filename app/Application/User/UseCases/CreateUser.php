<?php

namespace App\Application\User\UseCases;

use App\Application\User\DTO\CreateUserDTO;
use App\Domain\User\Repositories\UserRepository;

class CreateUser
{
    public function __construct(private UserRepository $repository) {}

    public function executar(CreateUserDTO $data)
    {
        return $this->repository->criar($data);
    }
}
