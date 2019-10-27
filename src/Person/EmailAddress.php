<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents an Email Address
 */
final class EmailAddress extends StringBasedValueObject
{
    public function __construct(string $address)
    {
        Assertion::email($address);

        parent::__construct(strtolower($address));

    }

    public function getDomain(): string
    {
        return explode('@', $this->value)[1];
    }
}
