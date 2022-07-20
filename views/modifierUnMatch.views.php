<?php

ob_start(); // 1.1

?>
<h1 class= 'text-center py-5'>Modifier un match</h1>

<form method="POST" action="<?= URL ?>matchs/mv">
  <div class="form-group">
    <label for="contest_id">contest_id</label>
    <input type="text" class="form-control" id="contest_id" name="contest_id" value="<?= $contest->getContestId(); ?>">
  </div>

  <div class="form-group">
    <label for="game_id">game_id</label>
    <input type="text" class="form-control" id="game_id" name="game_id" value="<?= $contest->getGameId(); ?>">
  </div>

  <div class="form-group">
    <label for="start_date">Start_date</label>
    <input type="text" class="form-control" id="start_date" name="start_date" value="<?= $contest->getStartDate(); ?>">
  </div>

  <div class="form-group">
    <label for="winner_id">Winner_id</label>
    <input type="text" class="form-control" id="winner_id" name="winner_id" value="<?= $contest->getWinnerId(); ?>">
  </div>

  <button type="submit" class="btn btn-primary my-3">Modifier</button>
</form>

<?php

$content = ob_get_clean(); // 1.2. Tout ce qui sera compris entre le ob_start() et ob_get_clean() sera enregistré dans la variable content
require "layout.php"; // 3. C'est comme si on appelait le fichier layout

?>