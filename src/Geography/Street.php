<?php 

namespace Morebec\ValueObjects\Geography;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Street
 */
class Street extends StringBasedValueObject
{
    public function __construct(string $value)
    {
        Assertion::notBlank($value);
        parent::__construct($value);
    }
}
