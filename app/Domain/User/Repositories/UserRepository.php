<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;

interface UserRepository
{
    public function criar(User $user): User;

    public function update(User $user): User;
}
