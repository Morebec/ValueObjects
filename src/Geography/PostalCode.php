<?php 

namespace Morebec\ValueObjects\Geography;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * PostalCode
 */
class PostalCode extends StringBasedValueObject
{
    function __construct(string $value)
    {
        Assertion::notBlank($value);
        parent::__construct($value);
    }
}
