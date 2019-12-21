<?php

namespace Morebec\ValueObjects\DateTime;

use Morebec\ValueObjects\DateTime\Date\Date;
use Morebec\ValueObjects\DateTime\Time\Time;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * DateTime
 */
class DateTime implements ValueObjectInterface
{
    /** @var Date */
    private $date;

    /** @var Time */
    private $time;

    public function __construct(Date $date, Time $time)
    {
        $this->date = $date;
        $this->time = $time;
    }
    
    /**
     * Returns the date portion of the date time
     * @return Date
     */
    public function getDate(): Date
    {
        return $this->date;
    }

    public function getTime(): Time
    {
        return $this->time;
    }

    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        return (string)$this === (string)$valueObject;
    }

    /**
     * Returns a string representation of the value object
     *
     * @return string
     */
    public function __toString()
    {
        return $this->date . ' ' . $this->time;
    }
}
