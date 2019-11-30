# ValueObjects
A PHP Value Object Library in use by Morebec Projects

[![Build Status](https://travis-ci.com/Morebec/ValueObjects.svg?branch=master)](https://travis-ci.com/Morebec/ValueObjects)
[![Coverage Status](https://coveralls.io/repos/github/Morebec/ValueObjects/badge.svg?branch=master)](https://coveralls.io/github/Morebec/ValueObjects?branch=master)

Value objects are small objects representing simple concepts, and whose equality is
based on their internal property values rather than a specific identity.

Value objects must honour the following contract:

- They are immutable (no setters)
- They are Self Validating
- They represent and describe concepts in a clear way

## Installation
To install the library in a project, add these lines to your `composer.json` configuration file:

```json
{
    "repositories": [
        {
            "url": "https://github.com/Morebec/ValueObjects.git",
            "type": "git"
        }
    ],
    "require": {
        "morebec/value-objects": "1.0"
    }
}
```
 
## Usage
This library comes with a number of predesigned ValueObject classes, 
that you can use in your projects.
The ValueObject either implement the `ValueObjectInterface` or extend the 
`BasicEnum` class.


### Creating your own Value Object using `ValueObjectInterface`
To create, one needs to implement the `ValueObjectInterface` and
implement the two following methods: 
- `__toString()`
- `isEqualTo(ValueObjectInterface $valueObject): bool`

Here's a basic example: 

```php
use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Age Value Object
 */
final class Age implements ValueObjectInterface
{
    /** @var int age */
    private $age;

    public function __construct(int $age)
    {
        Assertion::min($age, 1);
        $this->age = $age;
    }

    public function __toString()
    {
        return strval($this->age);
    }

    /**
     * Returns the value of this age object
     * @return int
     */
    public function toInt(): int
    {
        return $this->age;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $vo): bool
    {
        return (string)$this === (string)$vo;
    }
}
```

Doing that, our class can be used as follows:

```php
$age = new Age(24);

// Test Equality
$maturity = new Age(18);
$age->isEqualTo($maturity); // false  
$age == $maturity; // false
$age === '18'; // false

// Test Greater than
$age->toInt() >= 18; // true
$age->toInt() >= $maturity->toInt();

```

### Creating your own Enum class extending `BasicEnum`
To create a new Enum, one needs to extend the `BasicEnum` class.
As an example, lets pretend we want to create a CardinalPoint Class.
Since there are strictly 4 cardinal points, we will create an enum based 
ValueObject:

```php
<?php

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * CardinalPoint
 */
class CardinalPoint implements ValueObjectInterface
{
    const NORTH = 'NORTH';    
    const EAST = 'EAST';    
    const WEST = 'WEST';  
    const SOUTH = 'SOUTH';
}
```

Doing this, will allow us to use our class in the following way:

```php
// Instatiate a new CardinalPoint instance
$direction = new CardinalPoint(CardinalPoint::NORTH);

// Since Enums have builtin validation,
// the following line would throw an InvalidArgumentException:
$direction = new CardinalPoint('North');
// However the following would work:
$direction = new CardinalPoint('NORTH');

// Using in functions or class methods 
public function changeDirection(CardinalPoint $direction)
{
    // Testing equlity with string
    if(!$direction->isEqualTo(new CardinalPoint(CardinalPoint::EAST))) {
        echo 'Not going East!';
    }

    // Since the constants are strings, it is also possible to compare
    // using string comparison
    if($direction == CardinalPoint::NORTH) {
        echo 'Definitely going North!';
    }    
}

```

## Running Tests
The tests are based on codeception.
To run the tests simply run:

```bash
composer test
```


