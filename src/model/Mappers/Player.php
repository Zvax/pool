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

    public function find($playerId)
    {
        $sql = "SELECT * FROM players WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $playerId
        ]);
        return $stmt->fetchObject("Pool\\Model\\Player");
    }
}