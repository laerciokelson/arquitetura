<?php

namespace App\Domain\User\Repositories;

use App\Application\User\DTO\CreateUserDTO;
use App\Models\User;

interface UserRepository
{
    public function criar(CreateUserDTO $dados): User;
}
