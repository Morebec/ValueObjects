<?php

namespace Morebec\ValueObjects\Text;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a word
 */
class Word extends StringBasedValueObject
{
    public function __construct(string $word)
    {
        Assertion::notBlank($word);
        Assertion::notContains($word, ' ', 'A word cannot contain a space " " character');
        parent::__construct($word);
    }

    /**
     * Returns an array of chars
     * @return array array of Chars
     */
    public function getChars(): array
    {
        $chars = [];

        $len = strlen($this->value);
        for ($i=0; $i < $len; $i++) {
            $chars[] = new Char($this->value[$i]);
        }

        return $chars;
    }
}
