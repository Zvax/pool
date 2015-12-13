<?php /** @var \Pool\Views\MainView $this */ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $this->title() ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
<div id="layout" class="pure-g">

    <div id="menu" class="pure-u-1-4">
        <div class="pure-menu">
            <ul class="pure-menu-list">
                <?php foreach ($this->menuItems() as $menuItem) { ?>
                    <li class="pure-menu-item">
                        <a href="<?= $menuItem['href'] ?>"><?= $menuItem['text'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>

    </div>

    <div id="main" class="pure-u-3-4">
        <div class="content">
            <?= $this->content() ?>
        </div>
    </div>

</div>
</body>
</html>

