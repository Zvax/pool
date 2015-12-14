<?php
/** @var \Pool\Views\Players\ListView $this */
/** @var \Pool\Model\Player $player */
?>
<form action="players" method="post">
    <label><input type="text" name="first name"></label>
    <label><input type="text" name=" last name"></label>
    <button type="submit">submit</button>
</form>
<ul>
    <?php
    foreach ($this->getPlayers() as $player)
    { ?>
        <li><?= $player->name ?></li>
    <?php } ?>
</ul>
