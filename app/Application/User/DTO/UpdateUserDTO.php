<?php

namespace App\Application\User\DTO;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Phone;

class UpdateUserDTO
{
    public function __construct(
        public int $id,
        public ?string $name = null,
        public ?Email $email = null,
        public ?Phone $phone = null,
        public ?int $profileId = null,
        public ?int $roleId = null,
    ) {}
}
