<?php

namespace Morebec\ValueObjects\DateTime\Time;

use Assert\Assertion;
use Morebec\ValueObjects\IntBasedValueObject;

/**
 * Represents a certain hour of the day
 */
class Hour extends IntBasedValueObject
{
    /** There are 24 hours in a day (0-23) */
    public const MAX_NUMBER = 23;
    
    public function __construct(int $nthHour)
    {
        Assertion::between($nthHour, 0, self::MAX_NUMBER);
        parent::__construct($nthHour);
    }
}
