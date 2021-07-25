<?php

use PHPUnit\Framework\TestCase;
use Shimoning\Formatter\Sql;

class SqlTest extends TestCase
{
    public function test_sanitizeTextForSearchQuery()
    {
        $result = Sql::sanitizeTextForSearchQuery('test');
        $this->assertEquals('test', $result);

        $result = Sql::sanitizeTextForSearchQuery('%test');
        $this->assertEquals('\%test', $result);

        $result = Sql::sanitizeTextForSearchQuery('test%');
        $this->assertEquals('test\%', $result);

        $result = Sql::sanitizeTextForSearchQuery('_test');
        $this->assertEquals('\_test', $result);

        $result = Sql::sanitizeTextForSearchQuery('test_');
        $this->assertEquals('test\_', $result);

        $result = Sql::sanitizeTextForSearchQuery('\test');
        $this->assertEquals('\\\test', $result);

        $result = Sql::sanitizeTextForSearchQuery('test\a');
        $this->assertEquals('test\\\a', $result);
    }
}
