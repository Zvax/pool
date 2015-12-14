<?php

namespace Pool\Controllers;

use Pool\Model\Mappers\Player;
use Pool\Model\Params;
use Pool\Model\Site;
use Pool\Views\Players\ListView;
use Templating\Renderer;

class Players
{
    private $pdo;
    private $playerMapper;
    private $siteModel;
    private $playerListView;
    private $renderer;

    public function __construct
    (
        \PDO $pdo,
        Params $params,
        Player $playerMapper,
        Site $siteModel,
        ListView $playerListView,
        Renderer $renderer
    )
    {
        $this->pdo = $pdo;
        $this->playerMapper = $playerMapper;
        $this->siteModel = $siteModel;
        $this->playerListView = $playerListView;
        $this->renderer = $renderer;
    }

    public function showOne($params)
    {
        $id = $params['id'];
        $this->siteModel->content = $id;
    }

    public function listPlayers()
    {
        $this->siteModel->content = $this->renderer->render('players/list',$this->playerListView);
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
        $this->listPlayers();
    }
}