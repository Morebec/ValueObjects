<?php 

namespace Morebec\ValueObjects\Geography;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * AptSuite
 */
class AptSuite extends StringBasedValueObject
{
    public function __construct(string $value)
    {
        Assertion::notBlank($value);
        parent::__construct($value);
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
