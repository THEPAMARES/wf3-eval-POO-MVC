<?php

ob_start(); // 1.1

?>
<h1 class= 'text-center py-5'>Ajouter un joueur</h1>

<form method="POST" action="<?= URL ?>joueurs/av">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>

  <div class="form-group">
    <label for="nickname">Nickname</label>
    <input type="text" class="form-control" id="nickname" name="nickname">
  </div>

  <button type="submit" class="btn btn-primary my-3">Ajouter</button>
</form>

<?php

$content = ob_get_clean(); // 1.2. Tout ce qui sera compris entre le ob_start() et ob_get_clean() sera enregistré dans la variable content
require "layout.php"; // 3. C'est comme si on appelait le fichier layout

?>
