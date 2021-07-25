<?php

use PHPUnit\Framework\TestCase;
use Shimoning\Formatter\Time;

class TimeTest extends TestCase
{
    public function test_number2clock()
    {
        $result = Time::number2clock(1);
        $this->assertEquals('0:01', $result);

        $result = Time::number2clock(59);
        $this->assertEquals('0:59', $result);

        $result = Time::number2clock(60);
        $this->assertEquals('1:00', $result);

        $result = Time::number2clock(61);
        $this->assertEquals('1:01', $result);

        $result = Time::number2clock(100);
        $this->assertEquals('1:40', $result);

        $result = Time::number2clock(123);
        $this->assertEquals('2:03', $result);

        $result = Time::number2clock(1801);
        $this->assertEquals('30:01', $result);

        $result = Time::number2clock(6030);
        $this->assertEquals('100:30', $result);
    }

    public function test_number2clockWithSeparator()
    {
        $result = Time::number2clock(100, '-');
        $this->assertEquals('1-40', $result);
    }

    public function test_clock2number()
    {
        $result = Time::clock2number('0:01');
        $this->assertEquals(1, $result);

        $result = Time::clock2number('0:59');
        $this->assertEquals(59, $result);

        $result = Time::clock2number('1:01');
        $this->assertEquals(61, $result);

        $result = Time::clock2number('1:40');
        $this->assertEquals(100, $result);

        $result = Time::clock2number('2:03');
        $this->assertEquals(123, $result);

        $result = Time::clock2number('30:01');
        $this->assertEquals(1801, $result);

        $result = Time::clock2number('100:30');
        $this->assertEquals(6030, $result);

        $result = Time::clock2number('010:10');
        $this->assertEquals(610, $result);
    }

    public function test_clock2numberWithSeparator()
    {
        $result = Time::clock2number('1-40', '-');
        $this->assertEquals(100, $result);
    }
}
