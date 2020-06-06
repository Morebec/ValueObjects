<?php 

namespace Morebec\ValueObjects\Geography;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * StateProvince
 */
class StateProvince extends StringBasedValueObject
{
    public function __construct(string $value)
    {
        Assertion::notBlank($value);
        parent::__construct($value);
    }
}
