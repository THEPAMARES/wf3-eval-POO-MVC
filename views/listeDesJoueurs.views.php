
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
<h1 class= 'text-center py-5'>Liste des Joueurs</h1>

<table class="table text-center">
    <tr class="table-info">
        <th> Player_id</th>
        <th>Email</th>
        <th>Nickname</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php for($i=0; $i < count($players); $i++) : ?>
        <tr>
            <td class="align-middle">
              <?= $players[$i]->getPlayerId(); ?>
            </td>

            <td class="align-middle">
              <a href="<?= URL ?>joueurs/l/<?= $players[$i]->getPlayerId(); ?>"><?= $players[$i]->getEmail(); ?></a>
            </td>

            <td class="align-middle"><?= $players[$i]->getNickname(); ?></td>

            <td class="align-middle">
              <a href="<?= URL ?>joueurs/m/<?= $players[$i]->getPlayerId(); ?>" class="btn btn-warning">Modifier</a>
            </td>

            <td class="align-middle">
              <a href="<?= URL?>joueurs/s/<?= $players[$i]->getPlayerId(); ?>"  onclick="return confirm('Voulez vous vraiment supprimer ce joueur ?')" class="btn btn-danger">supprimer</a>
            </td>

        </tr>
    <?php endfor ?>
</table>

<a href="<?= URL ?>joueurs/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
require "layout.php";

