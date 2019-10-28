<?php

namespace Morebec\ValueObjects\DateTime\Time;

use Assert\Assertion;
use Morebec\ValueObjects\IntBasedValueObject;

/**
 * Represents a certain minute in an hour
 */
class Minute extends IntBasedValueObject
{ 
    /** there are 60 minutes in an hour (0 - 59) */
    const MAX_NUMBER = 59;

    function __construct(int $nthMinute)
    {
        Assertion::between($nthMinute, 0, self::MAX_NUMBER);
        parent::__construct($nthMinute);
    }
}