<?php /** @var \Pool\Model\Domain\Player $this */ ?>
<h2><?= "$this->firstname $this->lastname" ?></h2>
<p>position: <?= $this->position ?></p>
<a href="/players/edit/<?= $this->id ?>">edit</a>