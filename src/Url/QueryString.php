<?php

namespace Morebec\ValueObjects\Url;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * QueryString
 */
class QueryString extends StringBasedValueObject
{
    public function __construct(string $queryString)
    {
        Assertion::startsWith($queryString, '?');

        if (\preg_match('/^\?([\w\.\-[\]~&%+]+(=([\w\.\-~&%+]+)?)?)*$/', $queryString) === 0) {
            throw new \InvalidArgumentException("Invalid query string: $queryString");
        }

        parent::__construct($queryString);
    }

    /**
     * Constructs an instance of this value object from a string value
     * @param string $value
     * @return static
     */
    public static function fromString(string $value): self
    {
        return new static($value);
    }

    public function toArray(): array
    {
        $query = str_replace('?', '', $this->value);
        $groups = explode('&', $query);

        $arr = [];
        foreach ($groups as $group) {
            list($key, $value)= explode('=', $group);
            $arr[$key] = $value;
        }

        return $arr;
    }
}
