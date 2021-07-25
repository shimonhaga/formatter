<?php

use PHPUnit\Framework\TestCase;
use Shimoning\Formatter\Sql;

class SqlTest extends TestCase
{
    public function test_sanitizeTextForSearchQuery()
    {
        $sanitized = Sql::sanitizeTextForSearchQuery('test');
        $this->assertEquals('test', $sanitized);

        $sanitized = Sql::sanitizeTextForSearchQuery('%test');
        $this->assertEquals('\%test', $sanitized);

        $sanitized = Sql::sanitizeTextForSearchQuery('test%');
        $this->assertEquals('test\%', $sanitized);

        $sanitized = Sql::sanitizeTextForSearchQuery('_test');
        $this->assertEquals('\_test', $sanitized);

        $sanitized = Sql::sanitizeTextForSearchQuery('test_');
        $this->assertEquals('test\_', $sanitized);

        $sanitized = Sql::sanitizeTextForSearchQuery('\test');
        $this->assertEquals('\\\test', $sanitized);

        $sanitized = Sql::sanitizeTextForSearchQuery('test\a');
        $this->assertEquals('test\\\a', $sanitized);
    }
}
