<?php

namespace App\Infrastructure\Persistence\User;

use App\Application\User\DTO\CreateUserDTO;
use App\Models\User;
use App\Domain\User\Repositories\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function criar(CreateUserDTO $data): User
    {
        return User::create([
            'name'       => $data->name,
            'email'      => $data->email->value(),
            'password'   => bcrypt($data->password),
            'phone'      => $data->phone->value(),
            'perfile_id' => $data->profile_id,
            'role_id'    => $data->role_id,
        ]);
    }
}
