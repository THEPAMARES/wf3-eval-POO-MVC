<?php

ob_start(); // 1.1

?>
<h1 class= 'text-center py-5'>Modifier un jeu</h1>

<form method="POST" action="<?= URL ?>jeux/mv">
  <div class="form-group">
    <label for="game_id">game_id</label>
    <input type="text" class="form-control" id="game_id" name="game_id" value="<?= $game->getGameId(); ?>">
  </div>

  <div class="form-group">
    <label for="title">Titre</label>
    <input type="text" class="form-control" id="title" name="title" value="<?= $game->getTitle(); ?>">
  </div>

  <div class="form-group">
    <label for="min_players">Min Players</label>
    <input type="text" class="form-control" id="min_players" name="min_players" value="<?= $game->getMin_players(); ?>">
  </div>

  <div class="form-group">
    <label for="max_players">Max Players</label>
    <input type="text" class="form-control" id="max_players" name="max_players" value="<?= $game->getMax_players(); ?>">
  </div>

  <button type="submit" class="btn btn-primary my-3">Modifier</button>
</form>

<?php

$content = ob_get_clean(); // 1.2. Tout ce qui sera compris entre le ob_start() et ob_get_clean() sera enregistré dans la variable content
require "layout.php"; // 3. C'est comme si on appelait le fichier layout

?>