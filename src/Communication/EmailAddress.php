<?php 

namespace Morebec\ValueObjects\Communication;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents an Email Address
 */
class EmailAddress extends StringBasedValueObject
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

    /**
     * Constructs an instance of this value object from a string value
     * @param string $value
     * @return static
     */
    public static function fromString(string $value): self
    {
        return new static($value);
    }
}
