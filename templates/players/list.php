<?php
/** @var \Pool\Views\Players\ListView $this */
/** @var \Pool\Model\Player $player */
?>
<a href="/players/add">add player</a>
<ul>
    <?php
    foreach ($this->getPlayers() as $player)
    { ?>
        <li><?= $player->name ?></li>
    <?php } ?>
</ul>
