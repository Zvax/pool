<?php /** @var \Pool\Model\Domain\Player $this */ ?>
<form action="/players/update" method="post">
    <input type="hidden" name="id" value="<?= $this->id ?>">
    <label>
        <input value="<?= $this->firstname ?>"
               type="text"
               name="firstname"
               placeholder="first name">
    </label>
    <label>
        <input value="<?= $this->lastname ?>"
               type="text"
               name="lastname"
               placeholder="last name">
    </label>
    <p>
        <label>
            position:
            <input type="text" value="<?= $this->position ?>" placeholder="position">
        </label>
    </p>
    <button type="submit">save</button>
</form>
