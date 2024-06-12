<?php

use PHPUnit\Framework\TestCase;
use Shimoning\Formatter\Excel;

class ExcelTest extends TestCase
{
    public function test_alphabet()
    {
        // エラー
        $result = Excel::alphabet(0);
        $this->assertFalse($result);

        // 1 -> A
        $result = Excel::alphabet(1);
        $this->assertEquals('A', $result);

        // 26 -> Z
        $result = Excel::alphabet(26);
        $this->assertEquals('Z', $result);

        // 27 -> AA
        $result = Excel::alphabet(27);
        $this->assertEquals('AA', $result);

        // 702 -> ZZ
        $result = Excel::alphabet(702);
        $this->assertEquals('ZZ', $result);

        // 703 -> AAA
        $result = Excel::alphabet(703);
        $this->assertEquals('AAA', $result);
    }

    public function test_index()
    {
        // エラー: 空文字
        $result = Excel::index('');
        $this->assertFalse($result);

        // エラー: 英字以外
        $result = Excel::index('エラー');
        $this->assertFalse($result);

        // A -> 1
        $result = Excel::index('A');
        $this->assertEquals(1, $result);

        // a -> 1: 小文字
        $result = Excel::index('a');
        $this->assertEquals(1, $result);

        // Z -> 26
        $result = Excel::index('Z');
        $this->assertEquals(26, $result);

        // AA -> 27
        $result = Excel::index('AA');
        $this->assertEquals(27, $result);

        // ZZ -> 702
        $result = Excel::index('ZZ');
        $this->assertEquals(702, $result);

        // AAA -> 702
        $result = Excel::index('AAA');
        $this->assertEquals(703, $result);
    }
}
