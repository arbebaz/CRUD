<?php require_once('../controller/vehiculeController.php');?>
<?php require_once('./header.php');?>


<table class="container table mt-4">
  <thead>
    <tr>
      <th scope="col">id_vehicule</th>
      <th scope="col">agence</th>
      <th scope="col">Titre</th>
      <th scope="col">Marque</th>
      <th scope="col">Modele</th>
      <th scope="col">Description</th>
      <th scope="col">Photo</th>
      <th scope="col">Prix journalier</th>
      <th scope="col">ACTIONS</th>

    </tr>
  </thead>



  <?php foreach($arrayVehicule as $values): ?>

<tbody>
  <tr>

    <td><?= $values['id_vehicule']; ?></td>
    <td><?= $values['ville']; ?></td>
    <td><?= $values['titre']; ?></td>
    <td><?= $values['marque']; ?></td>
    <td><?= $values['modele']; ?></td>
    <td><?= $values['description']; ?></td>
    <td><img src=" <?= $values['photo'] ?>" width="200"></td>    
    <td><?= $values['prix_journalier']; ?></td>
    <td><a class="btn btn-danger" href="vehicule.php?actions=delete&id=<?= $values['id_vehicule']; ?>">DELETE</a>
    <td><a class="btn btn-primary" href="vehiculeDetails.php?actions=details&id=<?= $values['id_vehicule']; ?>">DETAILS</a>
    <td><a class="btn btn-dark" href="vehiculeUpdate?actions=update&id=<?= $values['id_vehicule']; ?>">UPDATE</a>

  </tr>
  
</tbody>

<?php endforeach; ?>

</table>

<form method="POST" class="container mt-4">

  <input class="form-control" type="text" placeholder="titre" name="titre">
  <input class="form-control" type="text" placeholder="marque" name="marque">
  <input class="form-control" type="text" placeholder="modele" name="modele">
  <input class="form-control" type="number" placeholder="prix_journalier" name="prix_journalier">
  <input class="form-control" type="text" placeholder="description" name="description">
  <input class="form-control" type="text" placeholder="photo" name="photo">
  
<select name="id_agence">
  <?php foreach($arrayAgences as $values): ?>

      <option value="<?= $values['id_agence']; ?>"><?= $values['ville']; ?></option>

  <?php endforeach; ?>
</select>

  
  
  <button class="form-control btn btn-dark" name="valider_vehicule">Valider</button>

</form>


<?php require_once('./footer.php');?>

