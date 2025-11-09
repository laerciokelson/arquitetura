<?php

namespace App\Application\User\DTO;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Phone;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public Email $email,
        public string $password,
        public Phone $phone,
        public int $profileId,
        public int $roleId,
    ){}
}
