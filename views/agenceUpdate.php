<?php require_once('../controller/agenceController.php'); ?>
<?php require_once('./header.php');?>




<div class="d-flex justify-content-center pt-2">
<form method="POST">
  <input type="hidden" name="id_agence" value="<?= $arrayDetails['id_agence']; ?>">
  <input class="form-control" type="text" name="titre" value="<?= $arrayDetails['titre']; ?>">
  <input class="form-control" type="text" name="adresse" value="<?= $arrayDetails['adresse']; ?>">
  <input class="form-control" type="text" name="ville" value="<?= $arrayDetails['ville']; ?>">
  <input class="form-control" type="text" name="cp" value="<?= $arrayDetails['cp']; ?>">
  <input class="form-control" type="text" name="description" value="<?= $arrayDetails['description']; ?>">
  <input class="form-control" type="text" name="photo" value="<?= $arrayDetails['photo']; ?>">
  <button class="form-control btn btn-dark" name="valider_update">Valider</button>
</form>
</div>




<?php require_once('./footer.php'); ?>