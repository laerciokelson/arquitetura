<?php

namespace App\Http\Controllers;

use App\Application\User\DTO\CreateUserDTO;
use App\Application\User\UseCases\CriarUtilizador;
use App\Application\User\DTO\CriarUtilizadorDTO;
use App\Application\User\UseCases\CreateUser;
use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Phone;
use Illuminate\Http\Request;

class UserController
{
    public function store(Request $request, CreateUser $usecase)
    {
        $dados = new CreateUserDTO(
            name: new Email($request->name),
            email: $request->email,
            password: $request->password,
            phone: new Phone($request->phone),
            profileId: $request->profile_id,
            roleId: $request->role_id,
        );

        return $usecase->executar($dados);
    }
}
