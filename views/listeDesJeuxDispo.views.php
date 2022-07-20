
<?php
if(!empty($_SESSION['alert'])){
 ?>
    <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
        <?= $_SESSION['alert']['msg'] ?>
    </div>
<?php } ?>

<?php
unset($_SESSION['alert']);
ob_start() ?>
<h1 class= 'text-center py-5'>Liste des Jeux</h1>

<table class="table text-center">
    <tr class="table-info">
        <th> Game_id</th>
        <th>Title</th>
        <th>Min_players</th>
        <th>Max_players</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php for($i=0; $i < count($games); $i++) : ?>
        <tr>
            <td class="align-middle">
              <?= $games[$i]->getGameId(); ?>
            </td>

            <td class="align-middle">
              <a href="<?= URL ?>jeux/l/<?= $games[$i]->getGameId(); ?>"><?= $games[$i]->getTitle(); ?></a>
            </td>

            <td class="align-middle"><?= $games[$i]->getMin_players(); ?></td>
            <td class="align-middle"><?= $games[$i]->getMax_players(); ?></td>

            <td class="align-middle">
              <a href="<?= URL ?>jeux/m/<?= $games[$i]->getGameId(); ?>" class="btn btn-warning">Modifier</a>
            </td>

            <td class="align-middle">
              <a href="<?= URL?>jeux/s/<?= $games[$i]->getGameId(); ?>"  onclick="return confirm('Voulez vous vraiment supprimer ce jeu ?')" class="btn btn-danger">supprimer</a>
            </td>

        </tr>
    <?php endfor ?>
</table>

<a href="<?= URL ?>jeux/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
require "layout.php";

