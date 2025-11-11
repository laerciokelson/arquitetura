<?php

namespace App\Domain\User\Entities;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Phone;
use InvalidArgumentException;

final class User
{
    public function __construct(
        public ?int $id,
        public string $name,
        public Email $email,
        public string $passwordHash,
        public Phone $phone,
        public int $profileId,
        public int $roleId,
    ) {
        // Invariant examples (can expand later)
        if (trim($this->name) === '') {
            throw new InvalidArgumentException('User name cannot be empty.');
        }
    }

    /**
     * Invariant: a User can change their name, but not to empty.
     */
    public function rename(string $newName): void
    {
        if (trim($newName) === '') {
            throw new InvalidArgumentException('User name cannot be empty.');
        }
        $this->name = $newName;
    }

    public function update(
        ?string $name = null,
        ?Email $email = null,
        ?string $passwordHash = null,
        ?Phone $phone = null,
        ?int $profileId = null,
        ?int $roleId = null
    ): void {
        if ($name !== null) {
            $this->rename($name);
        }
        if ($email !== null) {
            $this->email = $email;
        }
        if ($passwordHash !== null) {
            $this->passwordHash = $passwordHash;
        }
        if ($phone !== null) {
            $this->phone = $phone;
        }
        if ($profileId !== null) {
            $this->profileId = $profileId;
        }
        if ($roleId !== null) {
            $this->roleId = $roleId;
        }
    }
}
