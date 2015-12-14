<?php

namespace Model\Mappers;

use Application\Step;

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
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"\\Model\\Domain\\Player");
    }

    public function find($playerId)
    {
        $sql = "SELECT * FROM players WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $playerId
        ]);
        return $stmt->fetchObject("\\Model\\Domain\\Player");
    }



    public function updateFromPost()
    {
        $sql = "
            UPDATE players
            SET
              firstname=:firstname,
              lastname=:lastname,
              position=:position
            WHERE id=:id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $_POST['id'],
            ':firstname' => $_POST['firstname'],
            ':lastname' => $_POST['lastname'],
            ':position' => $_POST['position']
        ]);
        return new Step([
            "View\\Players\\Unique::show",
            [
                ':params' => ['id' => $_POST['id']]
            ],
        ]);
    }

}