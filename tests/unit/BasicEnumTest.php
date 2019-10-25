<?php 

use Morebec\ValueObjects\BasicEnum;

/**
 * BasicEnumTest
 */
class BasicEnumTest extends \Codeception\Test\Unit
{
    public function testEnumConstructorWithValidValue()
    {
        $enum = new EnumTest(EnumTest::STRING_VALUE);
    }

    public function testConstructorInvalidEnumValue($value='')
    {
        $this->expectException(\InvalidArgumentException::class);
        $enum = new EnumTest(null);
    }

    public function testEqualityWithString()
    {
        $enum = new EnumTest(EnumTest::STRING_VALUE);
        $this->assertEquals($enum, EnumTest::STRING_VALUE);
    }

    public function testInequalityWithString()
    {
        $enum = new EnumTest(EnumTest::STRING_VALUE);
        $this->assertNotEquals($enum, EnumTEst::ANOTHER_STRING_VALUE);
    }

    public function testEqualityWithInt()
    {
        $enum = new EnumTest(EnumTest::INT_VALUE);
        $this->assertEquals($enum->getValue(), EnumTest::INT_VALUE);
    }

    public function testInequalityWithInt()
    {
        $enum = new EnumTest(EnumTest::INT_VALUE);
        $this->assertNotEquals($enum->getValue(), EnumTest::ANOTHER_INT_VALUE);
    }

    public function testEqaulityWithValueObject()
    {
        $enum = new EnumTest(EnumTest::INT_VALUE);
        $this->assertTrue($enum->isEqualTo(new EnumTest(EnumTest::INT_VALUE)));
        $this->assertEquals($enum, new EnumTest(EnumTest::INT_VALUE));
    }

    public function testInequalityWithValueObject()
    {
        $enum = new EnumTest(EnumTest::INT_VALUE);
        $this->assertFalse($enum->isEqualTo(new EnumTest(EnumTest::ANOTHER_INT_VALUE)));
        $this->assertNotEquals($enum, new EnumTest(EnumTest::ANOTHER_INT_VALUE));
    }
}


/**
 * EnumTest
 */
class EnumTest extends BasicEnum
{
    const STRING_VALUE = 'STRING_VALUE';
    const ANOTHER_STRING_VALUE = 'ANOTHER_STRING_VALUE';

    const INT_VALUE = 55;    
    const ANOTHER_INT_VALUE = 50;    
}