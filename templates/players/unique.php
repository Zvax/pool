<?php /** @var \Model\Domain\Player $this */ ?>
<h2><?= "$this->firstname $this->lastname" ?></h2>
<p>position: <?= $this->position ?></p>
<div>
    <h4>salary</h4>
    <table>
        <tr>
            <td>2014</td>
            <td>2015</td>
            <td>2016</td>
        </tr>
        <tr>
            <td>2014</td>
            <td>2015</td>
            <td>2016</td>
        </tr>
    </table>
</div>
<a href="/players/edit/<?= $this->id ?>">edit</a>