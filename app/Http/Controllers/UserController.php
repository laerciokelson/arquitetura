<?php

namespace App\Http\Controllers;

use App\Application\User\DTO\CreateUserDTO;
use App\Application\User\UseCases\CriarUtilizador;
use App\Application\User\DTO\CriarUtilizadorDTO;
use App\Application\User\DTO\UpdateUserDTO;
use App\Application\User\UseCases\CreateUser;
use App\Application\User\UseCases\UpdateUser;
use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Phone;
use Illuminate\Http\Request;

class UserController
{
    public function store(Request $request, CreateUser $useCase)
    {
        $dto = new CreateUserDTO(
            name: new Email($request->name),
            email: $request->email,
            password: $request->password,
            phone: new Phone($request->phone),
            profileId: $request->profileId,
            roleId: $request->roleId,
        );

        return $useCase->executar($dto);
    }
    public function update(Request $request, int $id, UpdateUser $useCase)
    {
        $dto = new UpdateUserDTO(
            id: $id,
            name: $request->name,
            email: $request->email ?? new Email($request->email) ?? null,
            phone: $request->phone ?? new Phone($request->phone) ?? null,
            profileId: $request->profileId,
            roleId: $request->roleId,
        );

        return $useCase->executar($dto);
    }
}
