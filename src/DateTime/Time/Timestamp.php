<?php

namespace Morebec\ValueObjects\DateTime\Time;

use Assert\Assertion;
use Morebec\ValueObjects\IntBasedValueObject;

/**
 * Represents a Timestamp
 */
class Timestamp extends IntBasedValueObject
{
    public function __construct(int $timestamp)
    {
        Assertion::min($timestamp, 0);
        parent::__construct($timestamp);
    }

    /**
     * Returns the timestamp of now
     * @return Timestamp
     */
    public static function now(): Timestamp
    {
        return new Timestamp(time());
    }
}
