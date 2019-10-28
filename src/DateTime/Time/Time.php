<?php 

namespace Morebec\ValueObjects\DateTime\Time;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Represents a time of the day
 */
class Time implements ValueObjectInterface
{
    /** @var Hour */
    private $h;

    /** @var Minute */
    private $m;

    /** @var Second */
    private $s;

    function __construct(Hour $h, Minute $m, Second $s)
    {
        $this->h = $h;
        $this->m = $m;
        $this->s = $s;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
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
        $h = sprintf('%02d', $this->h->toInt());
        $m = sprintf('%02d', $this->m->toInt());
        $s = sprintf('%02d', $this->s->toInt());

        return "$h:$m:$s";
    }

    /**
     * Returns the hours of the time
     * @return Hour
     */
    public function getHour(): Hour
    {
        return $this->h;
    }

    /**
     * Returns the minutes of the time
     * @return Minute
     */
    public function getMinute(): Minute
    {
        return $this->m;
    }

    /**
     * Returns the secounds of the time
     * @return [type] [description]
     */
    public function getSecond(): Second
    {
        return $this->s;
    }

    /**
     * Returns a Time object where hour, minute and second, are equal to 0.
     * It is equivalent to calling midnight
     * @return Time
     */
    public static function zero(): Time
    {
        return new static(new Hour(0), new Minute(0), new Second(0));
    }

    /**
     * Returns midnight
     * @return Time
     */
    public function midnight(): Time
    {
        return self::zero();
    }

    /**
     * Returns the time before midnight on the following day
     * i.e. 23:59:59
     * @return Time
     */
    public function endOfDay(): Time
    {
        return new static(
            new Hour(Hour::MAX_NUMBER), 
            new Minute(Minute::MAX_NUMBER), 
            new Second(SECOND::MAX_NUMBER)
        );
    }
}