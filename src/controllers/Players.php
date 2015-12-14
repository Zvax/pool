<?php

namespace Pool\Controllers;

use Pool\Model\Params;

class Players
{
    private $pdo;

    public function __construct(\PDO $pdo,Params $params)
    {
        $this->pdo = $pdo;
        $params->section = 'players';
    }

    public function save()
    {
        $sql = "INSERT INTO players (firstname,lastname,id) VALUES (:firstname,:lastname,:id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => rand(),
            ':firstname' => $_POST['firstname'],
            ':lastname' => $_POST['lastname'],
        ]);
    }
}