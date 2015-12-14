<?php

namespace Pool\Controllers;

use Application\Step;
use Pool\Model\Mappers\Player;
use Pool\Model\Params;
use Pool\View\Players\ListView;
use Templating\Renderer;
use View\Site;

class Players
{
    private $pdo;
    private $playerMapper;
    private $siteView;
    private $playerListView;
    private $renderer;

    public function __construct
    (
        \PDO $pdo,
        Params $params,
        Player $playerMapper,
        Site $site,
        ListView $playerListView,
        Renderer $renderer
    )
    {
        $this->pdo = $pdo;
        $this->playerMapper = $playerMapper;
        $this->siteView = $site;
        $this->playerListView = $playerListView;
        $this->renderer = $renderer;
    }

    public function showOne($params)
    {
        $id = $params['id'];
        $this->siteView->content = $id;
        return new Step("View\\Site::show");
    }

    public function listPlayers()
    {
        $this->siteView->content = $this->renderer->render('players/list',$this->playerListView);
        return new Step("View\\Site::show");
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