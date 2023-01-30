<?php require_once('../controller/agenceController.php');?>
<?php require_once('./header.php');?>


<table class="container table mt-4">
  <thead>
    <tr>
      <th scope="col">id_agence</th>
      <th scope="col">Titre</th>
      <th scope="col">Adresse</th>
      <th scope="col">Ville</th>
      <th scope="col">Code postal</th>
      <th scope="col">Description</th>
      <th scope="col">Photo</th>
      <th scope="col">DELETE</th>

    </tr>
  </thead>

  <?php foreach($arrayAgence as $values): ?>

  <tbody>
    <tr>
      <td><?= $values['id_agence']; ?></td>
      <td><?= $values['titre']; ?></td>
      <td><?= $values['adresse']; ?></td>
      <td><?= $values['ville']; ?></td>
      <td><?= $values['cp']; ?></td>
      <td><?= $values['description']; ?></td>
      <td><img src=" <?= $values['photo'] ?>" width="200"></td>
      <td><a class="btn btn-danger" href="?actions=delete&id=<?= $values['id_agence']; ?>">DELETE</a>
      <td><a class="btn btn-primary" href="agenceDetails.php?actions=details&id=<?= $values['id_agence']; ?>">DETAILS</a>
      <td><a class="btn btn-dark" href="agenceUpdate.php?actions=details&id=<?= $values['id_agence']; ?>">UPDATE</a>

    </tr>
    
  </tbody>

  <?php endforeach; ?>

</table>

<form method="POST" class="container mt-4">

    <input class="form-control" type="text" placeholder="titre" name="titre">
    <input class="form-control" type="text" placeholder="adresse" name="adresse">
    <input class="form-control" type="text" placeholder="ville" name="ville">
    <input class="form-control" type="text" placeholder="cp" name="cp">
    <input class="form-control" type="text" placeholder="description" name="description">
    <input class="form-control" type="text" placeholder="photo" name="photo">
    <button class="form-control btn btn-dark" name="valider_agence">Valider</button>

</form>

<?php require_once('./footer.php');?>

