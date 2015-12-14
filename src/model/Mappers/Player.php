<?php

namespace Pool\Model\Mappers;

class Player
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($start = 0, $quantity = 500)
    {
        $sql = "SELECT * FROM players LIMIT $start,$quantity";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Pool\\Model\\Player");
    }
}