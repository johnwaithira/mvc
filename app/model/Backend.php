<?php

namespace Students\John\app\model;

use Students\John\database\Database;

class Backend
{
    public Database $database;
    public function __construct(Database $database)
    {
        $this->database = $database;

    }

    public function User($params)
    {
        $db = $this->database->pdo;

        $query = $db->prepare("SELECT * FROM userss where username = ?");
        $query->execute([$params]);

        return $query->fetch();
    }

}