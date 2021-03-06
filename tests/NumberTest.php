<?php

namespace Tests\Money;

use Money\Number;

class NumberTest extends \PHPUnit_Framework_TestCase
{
    public function testDecimal()
    {
        $number = new Number('10');
        $this->assertFalse($number->isDecimal());

        $number = new Number('10.5');
        $this->assertTrue($number->isDecimal());

        $number = new Number('10.5');
        $this->assertTrue($number->isDecimal());

        $number = new Number((string) PHP_INT_MAX);
        $this->assertFalse($number->isDecimal());
    }

    public function testHalf()
    {
        $number = new Number('10');
        $this->assertFalse($number->isHalf());

        $number = new Number('10.5');
        $this->assertTrue($number->isHalf());

        $number = new Number('10.5');
        $this->assertTrue($number->isHalf());

        $number = new Number('10.500');
        $this->assertTrue($number->isHalf());

        $number = new Number((string) PHP_INT_MAX);
        $this->assertFalse($number->isHalf());
    }

    public function testCurrentEven()
    {
        $number = new Number('10');
        $this->assertTrue($number->isCurrentEven());

        $number = new Number('3');
        $this->assertFalse($number->isCurrentEven());

        $number = new Number('10.5');
        $this->assertTrue($number->isCurrentEven());

        $number = new Number('10.5');
        $this->assertTrue($number->isCurrentEven());

        $number = new Number('10.500');
        $this->assertTrue($number->isCurrentEven());

        $number = new Number('3.5');
        $this->assertFalse($number->isCurrentEven());

        $number = new Number('3.5');
        $this->assertFalse($number->isCurrentEven());

        $number = new Number('3.500');
        $this->assertFalse($number->isCurrentEven());
    }

    public function testConstructor()
    {
        $this->setExpectedException('InvalidArgumentException');
        new Number(10.5);
    }

    public function testFromFloat()
    {
        $number = Number::fromFloat(79.10);
        $this->assertEquals('79.10', (string) $number);
    }
}
