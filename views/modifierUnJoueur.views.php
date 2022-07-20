<?php

ob_start(); // 1.1

?>
<h1 class= 'text-center py-5'>Modifier un joueur</h1>

<form method="POST" action="<?= URL ?>joueurs/mv">
    <div class="form-group">
        <label for="player_id">player_id</label>
        <input type="text" class="form-control" id="player_id" name="player_id" value="<?= $player->getPlayerId(); ?>">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $player->getEmail(); ?>">
    </div>

    <div class="form-group">
        <label for="nickname">Nickname</label>
        <input type="text" class="form-control" id="nickname" name="nickname" value="<?= $player->getNickname(); ?>">
    </div>

    <button type="submit" class="btn btn-primary my-3">Modifier</button>
</form>

<?php

$content = ob_get_clean(); // 1.2. Tout ce qui sera compris entre le ob_start() et ob_get_clean() sera enregistré dans la variable content
require "layout.php"; // 3. C'est comme si on appelait le fichier layout

?>