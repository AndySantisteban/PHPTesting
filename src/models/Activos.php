<?php
namespace App\Models;

use App\Connection\Database;

class Activos
{
    public $id;
    public $name;
    public $description;
    public $owner;
    public $risk;
    public $status;

    public function __construct($id, $name, $description, $owner, $risk, $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->owner = $owner;
        $this->risk = $risk;
        $this->status = $status;
    }

    public static function getAll()
    {
        $list = [];
        $db = Database::getInstance();
        $result = $db->getConnection()->query('SELECT * FROM activos');
        while ($row = $result->fetch_assoc()) {
            $list[] = new Activos($row['id_activo'], $row['name_activo'], $row['description_activo'], $row['owner_activo'], $row['risk_activo'], $row['status_activo']);
        }
        return $list;
    }

    public static function getById($id)
    {
        $db = Database::getInstance();
        $result = $db->getConnection()->query('SELECT * FROM activos WHERE id_activo = ' . $id);
        $row = $result->fetch_assoc();
        return new Activos($row['id_activo'], $row['name_activo'], $row['description_activo'], $row['owner_activo'], $row['risk_activo'], $row['status_activo']);
    }

    public static function getByName($name)
    {
        $db = Database::getInstance();
        $result = $db->getConnection()->query('SELECT * FROM activos WHERE name_activo = "' . $name . '"');
        $row = $result->fetch_assoc();
        $activo = new Activos($row['id_activo'], $row['name_activo'], $row['description_activo'], $row['owner_activo'], $row['risk_activo'], $row['status_activo']);
        return $activo;
    }

    public static function add($name, $description, $owner, $risk, $status)
    {
        $db = Database::getInstance();
        $result = $db->getConnection()->query('INSERT INTO activos (name_activo, description_activo, owner_activo, risk_activo, status_activo) VALUES ("' . $name . '", "' . $description . '", "' . $owner . '", "' . $risk . '", "' . $status . '")');
        return $result;
    }

    public static function edit($id, $name, $description, $owner, $risk, $status)
    {
        $db = Database::getInstance();
        $result = $db->getConnection()->query('UPDATE activos SET name_activo = "' . $name . '", description_activo = "' . $description . '", owner_activo = "' . $owner . '", risk_activo = "' . $risk . '", status_activo = "' . $status . '" WHERE id_activo = ' . $id);
        return $result;
    }

    public static function updateOnlyName($id, $name)
    {
        $db = Database::getInstance();
        $result = $db->getConnection()->query('UPDATE activos SET name_activo = "' . $name . '" WHERE id_activo = ' . $id);
        return $result;
    }

    public static function updateStatus($id, $status)
    {
        $db = Database::getInstance();
        $result = null;
        if ($status === "Inactivo" || $status === "Activo") {
            $result = $db->getConnection()->query('UPDATE activos SET status_activo = "' . $status . '" WHERE id_activo = ' . $id);
            return $result;
        }

        return $result;
    }
    public static function delete($id)
    {
        $db = Database::getInstance();
        $result = $db->getConnection()->query('DELETE FROM activos WHERE id_activo = ' . $id);
        return $result;
    }

    public static function getByOwner($owner)
    {
        $list = [];
        $db = Database::getInstance();
        $result = $db->getConnection()->query('SELECT * FROM activos WHERE owner_activo = "' . $owner . '"');
        while ($row = $result->fetch_assoc()) {
            $list[] = new Activos($row['id_activo'], $row['name_activo'], $row['description_activo'], $row['owner_activo'], $row['risk_activo'], $row['status_activo']);
        }
        return $list;
    }

    public static function validateIsExist($name)
    {
        $db = Database::getInstance();
        $result = $db->getConnection()->query('SELECT * FROM activos WHERE name_activo = "' . $name . '"');
        $row = $result->fetch_assoc();
        return $row;
    }

    public static function getByRisk($risk)
    {
        $list = [];
        $db = Database::getInstance();
        $result = $db->getConnection()->query('SELECT * FROM activos WHERE risk_activo = "' . $risk . '"');
        while ($row = $result->fetch_assoc()) {
            $list[] = new Activos($row['id_activo'], $row['name_activo'], $row['description_activo'], $row['owner_activo'], $row['risk_activo'], $row['status_activo']);
        }
        return $list;
    }

    public static function getByStatus($status)
    {
        $list = [];
        $db = Database::getInstance();
        $result = $db->getConnection()->query('SELECT * FROM activos WHERE status_activo = "' . $status . '"');
        while ($row = $result->fetch_assoc()) {
            $list[] = new Activos($row['id_activo'], $row['name_activo'], $row['description_activo'], $row['owner_activo'], $row['risk_activo'], $row['status_activo']);
        }
        return $list;
    }

}