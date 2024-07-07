<?php

use PHPUnit\Framework\TestCase;
use Shimoning\Formatter\Range;

class RangeTest extends TestCase
{
    public function test_lowerBound()
    {
        // 10番台
        $result = Range::lowerBound(1, 2);
        $this->assertEquals(10, $result);

        // 200番台
        $result = Range::lowerBound(2, 3);
        $this->assertEquals(200, $result);

        // 3000番台
        $result = Range::lowerBound(3, 4);
        $this->assertEquals(3000, $result);
    }

    public function test_upperBound()
    {
        // 10番台
        $result = Range::upperBound(1, 2);
        $this->assertEquals(19, $result);

        // 200番台
        $result = Range::upperBound(2, 3);
        $this->assertEquals(299, $result);

        // 3000番台
        $result = Range::upperBound(3, 4);
        $this->assertEquals(3999, $result);
    }
}
