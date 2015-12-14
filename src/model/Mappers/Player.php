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
        $sql = "
            SELECT
              pla.id,
              firstname,
              lastname,
              position
            FROM players AS pla
            LEFT JOIN contracts AS ctr ON ctr.player_id=pla.id
            LEFT JOIN contracts_years AS yrs ON yrs.contract_id=ctr.id
            WHERE pla.id=:id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $playerId
        ]);
        $player = $stmt->fetchObject("\\Model\\Domain\\Player");
        return $player;
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