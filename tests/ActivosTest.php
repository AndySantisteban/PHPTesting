<?php

declare (strict_types = 1);

namespace App\Tests;

use App\Models\Activos;
use PHPUnit\Framework\TestCase;

class ActivosTest extends TestCase
{

    public function testGetAll()
    {
        $activos = Activos::getAll();
        $this->assertIsArray($activos);
    }

    public function testGetById()
    {
        $activo = Activos::getById(1);
        $this->assertInstanceOf(Activos::class, $activo);
    }

    public function testGetByName()
    {
        $activo = Activos::getByName('Instancia');
        $this->assertInstanceOf(Activos::class, $activo);
    }

    public function testGetByOwner()
    {
        $activos = Activos::getByOwner('Juan');
        $this->assertIsArray($activos);
    }

    public function testAdd()
    {
        $result = Activos::add('Activo nuevo', 'Descripción nuevo', 'Javier', 2, 'Activo');
        $this->assertTrue($result);
    }

    public function testRemove()
    {
        $result = Activos::delete(6);
        $this->assertTrue($result);
    }
    public function testFailedRemove()
    {

        $result = Activos::delete("0");
        $this->assertTrue($result);
    }

    public function testEdit()
    {
        $result = Activos::edit(1, 'Activo 1', 'Descripción 1', 'Javier', 2, 'Activo');
        $this->assertTrue($result);
    }

    public function testValidateIsExist()
    {
        $result = Activos::validateIsExist("IPs List");
        $this->assertIsArray($result);
    }

    public function testUpdateOnlyName()
    {
        $result = Activos::updateOnlyName(1, 'Instancia');
        $this->assertTrue($result);
    }

    public function testUpdateStatus()
    {
        $result = Activos::updateStatus(1, 'Inactivo');
        $this->assertTrue($result);
    }
    public function testUpdateStatusFailed()
    {
        $result = Activos::updateStatus(1, 'Eliminado');
        $this->assertNull($result);
    }
    public function testGetAllByRisk()
    {
        $activos = Activos::getByRisk(2);
        $this->assertIsArray($activos);
    }

    public function testGetAllByStatus()
    {
        $activos = Activos::getByStatus('Activo');
        $this->assertIsArray($activos);
    }
}