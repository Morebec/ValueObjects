<?php

namespace Morebec\ValueObjects\Url;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * QueryString
 */
class QueryString extends StringBasedValueObject
{
    /** @var string the query string containing ? */
    private $query;

    function __construct(string $queryString)
    {
        Assertion::startsWith($queryString, '?');

        if (\preg_match('/^\?([\w\.\-[\]~&%+]+(=([\w\.\-~&%+]+)?)?)*$/', $queryString) === 0) {
            throw new \InvalidArgumentException("Invalid query string: $queryString");
        }

        parent::__construct($queryString);
    }

    public function toArray(): array
    {
        throw new \Exception("Unimplemented method");
    }
}