<?php 

namespace Morebec\ValueObjects\Geography;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * AptSuite
 */
class AptSuite extends StringBasedValueObject
{
    function __construct(string $value)
    {
        Assertion::notBlank($value);
        parent::__construct($value);
    }
}
