<?php

use PHPUnit\Framework\TestCase;
use Shimoning\Formatter\Time;

class TimeTest extends TestCase
{
    public function test_number2clock()
    {
        $clock = Time::number2clock(1);
        $this->assertEquals('0:01', $clock);

        $clock = Time::number2clock(59);
        $this->assertEquals('0:59', $clock);

        $clock = Time::number2clock(60);
        $this->assertEquals('1:00', $clock);

        $clock = Time::number2clock(61);
        $this->assertEquals('1:01', $clock);

        $clock = Time::number2clock(100);
        $this->assertEquals('1:40', $clock);

        $clock = Time::number2clock(123);
        $this->assertEquals('2:03', $clock);

        $clock = Time::number2clock(1801);
        $this->assertEquals('30:01', $clock);

        $clock = Time::number2clock(6030);
        $this->assertEquals('100:30', $clock);
    }

    public function test_number2clockWithSeparator()
    {
        $clock = Time::number2clock(100, '-');
        $this->assertEquals('1-40', $clock);
    }

    public function test_clock2number()
    {
        $clock = Time::clock2number('0:01');
        $this->assertEquals(1, $clock);

        $number = Time::clock2number('0:59');
        $this->assertEquals(59, $number);

        $clock = Time::clock2number('1:01');
        $this->assertEquals(61, $clock);

        $number = Time::clock2number('1:40');
        $this->assertEquals(100, $number);

        $number = Time::clock2number('2:03');
        $this->assertEquals(123, $number);

        $number = Time::clock2number('30:01');
        $this->assertEquals(1801, $number);

        $number = Time::clock2number('100:30');
        $this->assertEquals(6030, $number);

        $number = Time::clock2number('010:10');
        $this->assertEquals(610, $number);
    }

    public function test_clock2numberWithSeparator()
    {
        $number = Time::clock2number('1-40', '-');
        $this->assertEquals(100, $number);
    }
}
