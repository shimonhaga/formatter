<?php

use PHPUnit\Framework\TestCase;
use Shimoning\Formatter\Number;

class NumberTest extends TestCase
{
    public function test_removeComma()
    {
        $result = Number::removeComma('123');
        $this->assertEquals(123, $result);

        $result = Number::removeComma(123);
        $this->assertEquals(123, $result);

        $result = Number::removeComma('1234');
        $this->assertEquals(1234, $result);

        $result = Number::removeComma(1234);
        $this->assertEquals(1234, $result);

        $result = Number::removeComma('123,456');
        $this->assertEquals(123456, $result);

        $result = Number::removeComma('123,123,123');
        $this->assertEquals(123123123, $result);

        $result = Number::removeComma('1,,,1');
        $this->assertEquals(11, $result);
    }

    public function test_removeCommaWithSeparator()
    {
        $result = Number::removeComma('123', '=');
        $this->assertEquals(123, $result);

        $result = Number::removeComma(123, '=');
        $this->assertEquals(123, $result);

        $result = Number::removeComma('1234', '=');
        $this->assertEquals(1234, $result);

        $result = Number::removeComma(1234, '=');
        $this->assertEquals(1234, $result);

        $result = Number::removeComma('123=456', '=');
        $this->assertEquals(123456, $result);

        $result = Number::removeComma('123=123=123', '=');
        $this->assertEquals(123123123, $result);

        $result = Number::removeComma('1==1', '=');
        $this->assertEquals(11, $result);
    }

    public function test_numberFormat()
    {
        $result = Number::numberFormat('123');
        $this->assertEquals(123, $result);

        $result = Number::numberFormat(123);
        $this->assertEquals(123, $result);

        $result = Number::numberFormat('1234');
        $this->assertEquals('1,234', $result);

        $result = Number::numberFormat(1234);
        $this->assertEquals('1,234', $result);

        $result = Number::numberFormat(123456);
        $this->assertEquals('123,456', $result);

        $result = Number::numberFormat(123123123);
        $this->assertEquals('123,123,123', $result);

        $result = Number::numberFormat('1,1,1,1');
        $this->assertEquals('1,111', $result);
    }

    public function test_numberFormatWithAttachComma()
    {
        $result = Number::numberFormat('123', ' ');
        $this->assertEquals(123, $result);

        $result = Number::numberFormat(123, ' ');
        $this->assertEquals(123, $result);

        $result = Number::numberFormat('1234', ' ');
        $this->assertEquals('1 234', $result);

        $result = Number::numberFormat(1234, ' ');
        $this->assertEquals('1 234', $result);

        $result = Number::numberFormat(123456, ' ');
        $this->assertEquals('123 456', $result);

        $result = Number::numberFormat(123123123, ' ');
        $this->assertEquals('123 123 123', $result);

        $result = Number::numberFormat('1,1,1,1', ' ');
        $this->assertEquals('1 111', $result);
    }

    public function test_numberFormatWithDetachComma()
    {
        $result = Number::numberFormat('123', ' ', '=');
        $this->assertEquals(123, $result);

        $result = Number::numberFormat(123, ' ', '=');
        $this->assertEquals(123, $result);

        $result = Number::numberFormat('1234', ' ', '=');
        $this->assertEquals('1 234', $result);

        $result = Number::numberFormat(1234, ' ', '=');
        $this->assertEquals('1 234', $result);

        $result = Number::numberFormat('123=456', ' ', '=');
        $this->assertEquals('123 456', $result);

        $result = Number::numberFormat('123=123=123', ' ', '=');
        $this->assertEquals('123 123 123', $result);

        $result = Number::numberFormat('1=1==1', ' ', '=');
        $this->assertEquals('111', $result);

        $result = Number::numberFormat('1=1=1=1', ' ', '=');
        $this->assertEquals('1 111', $result);
    }
}
