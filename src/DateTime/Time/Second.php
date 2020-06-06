<?php

namespace Morebec\ValueObjects\DateTime\Time;

use Assert\Assertion;
use Morebec\ValueObjects\IntBasedValueObject;

/**
 * Represents a specific second in a minute
 */
class Second extends IntBasedValueObject
{
    /** there are 60 seconds in a minute (0 - 59) */
    public const MAX_NUMBER = 59;

    public function __construct(int $nthSecond)
    {
        Assertion::between($nthSecond, 0, self::MAX_NUMBER);
        parent::__construct($nthSecond);
    }
}
