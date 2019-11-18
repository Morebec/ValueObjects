<?php

namespace Morebec\ValueObjects\DateTime\Date;

use Assert\Assertion;
use Morebec\ValueObjects\IntBasedValueObject;

/**
 * Represents a certain number of days
 */
class MonthDay extends IntBasedValueObject
{
    const MIN_MONTH_DAY = 1;
    const MAX_MONTH_DAY = 31;

    public function __construct(int $nbdays)
    {
        Assertion::between($nbdays, self::MIN_MONTH_DAY, self::MAX_MONTH_DAY);
        parent::__construct($nbdays);
    }

    /**
     * Returns the current year
     * @return Year
     */
    public static function now(): Year
    {
        return new static(date('d'));
    }
}
