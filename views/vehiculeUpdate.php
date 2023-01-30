<?php require_once('../controller/vehiculeController.php'); ?>
<?php require_once('./header.php'); ?>



<div class="d-flex justify-content-center pt-2">
    <form method="POST">
        <input type="hidden" name="id_vehicule" value="<?= $arrayUpdate['id_vehicule']; ?>">
        <input type="hidden" name="id_agence" value="<?= $arrayUpdate['id_agence']; ?>">
        <input class="form-control" type="text" name="titre" value="<?= $arrayUpdate['titre']; ?>">
        <input class="form-control" type="text" name="marque" value="<?= $arrayUpdate['marque']; ?>">
        <input class="form-control" type="text" name="modele" value="<?= $arrayUpdate['modele']; ?>">
        <input class="form-control" type="text" name="prix_journalier" value="<?= $arrayUpdate['prix_journalier']; ?>">
        <input class="form-control" type="text" name="description" value="<?= $arrayUpdate['description']; ?>">
        <input class="form-control" type="text" name="photo" value="<?= $arrayUpdate['photo']; ?>">
        <button class="form-control btn btn-dark" name="valider_update" value="valider_update">Valider</button>
    </form>
</div>




<?php require_once('./footer.php'); ?>