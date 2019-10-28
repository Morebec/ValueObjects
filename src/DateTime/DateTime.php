<?php 

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

    function __construct(Date $date, Time $time)
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
        return $this->date . ' ' . $this->time;
    }
}