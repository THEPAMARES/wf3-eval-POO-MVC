
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
<h1 class= 'text-center py-5'>Liste des Matchs</h1>
<table class="table text-center">
    <tr class="table-info">
        <th> Contest_id</th>
        <th> Game_id</th>
        <th> Start Date</th>
        <th>Winner_id</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php for($i=0; $i < count($contests); $i++) : ?>
        <tr>
            <td class="align-middle">
              <?= $contests[$i]->getContestId(); ?>
            </td>

            <td class="align-middle">
              <a href="<?= URL ?>matchs/l/<?= $contests[$i]->getContestId(); ?>"><?= $contests[$i]->getGameId(); ?></a>
            </td>

            <td class="align-middle"><?= $contests[$i]->getStartDate(); ?></td>
            <td class="align-middle"><?= $contests[$i]->getWinnerId(); ?></td>

            <td class="align-middle">
              <a href="<?= URL ?>matchs/m/<?= $contests[$i]->getContestId(); ?>" class="btn btn-warning">Modifier</a>
            </td>

            <td class="align-middle">
              <a href="<?= URL?>matchs/s/<?= $contests[$i]->getContestId(); ?>"  onclick="return confirm('Voulez vous vraiment supprimer ce match ?')" class="btn btn-danger">supprimer</a>
            </td>

        </tr>
    <?php endfor ?>
</table>

<a href="<?= URL ?>matchs/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
require "layout.php";

