<?php

namespace Morebec\ValueObjects;

/**
 * Basic enum class
 * Source: https://stackoverflow.com/questions/254514/php-and-enumerations
 */
abstract class BasicEnum implements ValueObjectInterface
{
    private static $constCacheArray = null;

    /** @var mixed value (for type hinting) */
    private $value;

    public function __construct($value)
    {
        self::validateValue($value);
        $this->value = $value;
    }

    public function __toString()
    {
        return strval($this->getValue());
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
     * Returns the value of the enum
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * Returns the constant names of this enum
     * @return array
     */
    private static function getConstants(): array
    {
        if (self::$constCacheArray == null) {
            self::$constCacheArray = [];
        }

        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }

        return self::$constCacheArray[$calledClass];
    }

    /**
     * Indicates if a certain name is considered a valid name for
     * this enum
     * @param  string  $name   name to test
     * @param  boolean $strict case incensitive
     * @return boolean         true if valid, otherwise falses
     */
    public static function isValidName(string $name, bool $strict = false): bool
    {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    /**
     * Indicates if a value is a valid value for this enum
     * @param  mixed  $value   the value to test
     * @param  boolean $strict Strictly test for exact value
     * @return boolean         true if valid, otherwise false
     */
    public static function isValidValue($value, bool $strict = true): bool
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }

    public static function getValues(): array
    {
        return array_values(self::getConstants());
    }

    /**
     * Validates a certain value, if it is not a vlaid value
     * throws an exception
     * @param  mixed $value the value to test
     * @return void
     */
    public static function validateValue($value): void
    {
        if (!self::isValidValue($value)) {
            throw new \InvalidArgumentException("Invalid value: $value", 1);
        }
    }

    /**
     * Returns an array of keys and values
     * @return array
     */
    public static function getNamesAndValues(): array
    {
        return self::getConstants();
    }
    
    /**
     * Used so it is poossible to do things like
     * Enum::VALUE()
     */
    public static function __callStatic($method, $arguments)
    {
        static::validateValue($method);
        return new static($method);
    }
}
