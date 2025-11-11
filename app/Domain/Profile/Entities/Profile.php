<?php

namespace App\Domain\Profile\Entities;

final class Profile
{
    public function __construct(
        public ?int $id,
        public string $bio,
        public ?string $avatarUrl = null,
    ) {
        if (trim($this->bio) === '') {
            throw new \InvalidArgumentException('Profile bio cannot be empty.');
        }
    }

    public function updateBio(string $bio): void
    {
        if (trim($bio) === '') {
            throw new \InvalidArgumentException('Profile bio cannot be empty.');
        }
        $this->bio = $bio;
    }
}
