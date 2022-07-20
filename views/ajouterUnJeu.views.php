<?php

ob_start(); // 1.1

?>
<h1 class= 'text-center py-5'>Ajouter un jeu</h1>

<form method="POST" action="<?= URL ?>jeux/av">
  <div class="form-group">
    <label for="title">Titre</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>

  <div class="form-group">
    <label for="min_players">Min Players</label>
    <input type="text" class="form-control" id="min_players" name="min_players">
  </div>

  <div class="form-group">
    <label for="max_players">Max Players</label>
    <input type="text" class="form-control" id="max_players" name="max_players">
  </div>

  <button type="submit" class="btn btn-primary my-3">Ajouter</button>
</form>

<?php

$content = ob_get_clean(); // 1.2. Tout ce qui sera compris entre le ob_start() et ob_get_clean() sera enregistré dans la variable content
require "layout.php"; // 3. C'est comme si on appelait le fichier layout

?>