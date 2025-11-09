<?php

namespace App\Domain\User\ValueObjects;

use InvalidArgumentException;

final class Phone
{
    private string $value;

    public function __construct(string $raw)
    {
        // Remove spaces, dashes, parentheses, etc
        $normalized = preg_replace('/\D+/', '', $raw);

        // Example minimal check (Portugal: 9 digits)
        if (strlen($normalized) < 9) {
            throw new InvalidArgumentException('Invalid phone number format.');
        }

        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Phone $other): bool
    {
        return $this->value === $other->value();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
