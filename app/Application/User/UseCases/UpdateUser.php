<?php

namespace App\Application\User\UseCases;

use App\Application\User\DTO\UpdateUserDTO;
use App\Domain\User\Repositories\UserRepository;
use DomainException;

class UpdateUser
{
    public function __construct(private UserRepository $repository) {}

    public function executar(UpdateUserDTO $data)
    {
        $user = $this->repository->findById($data->id);

        if (!$user) {
            throw new DomainException("User not found.");
        }

        $user->update(
            name: $data->name,
            email: $data->email,
            phone: $data->phone,
            profileId: $data->profileId,
            roleId: $data->roleId,
        );

        return $this->repository->update($user);
    }
}
