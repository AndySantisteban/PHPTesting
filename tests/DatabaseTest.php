<?php

declare (strict_types = 1);

namespace App\Tests;

use App\Connection\Database;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testGetInstance()
    {
        $database = Database::getInstance();
        $this->assertInstanceOf(Database::class, $database);
    }

    public function testGetConnection()
    {
        $database = Database::getInstance();
        $connection = $database->getConnection();
        $this->assertInstanceOf(\mysqli::class, $connection);
    }

    public function testExecuteFile()
    {
        $database = Database::getInstance();
        $result = $database->executeFileSql();
        $this->assertTrue($result);
    }
}