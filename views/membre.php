<?php require_once('../controller/agenceController.php');?>
<?php require_once('./header.php');?>


<table class="container table mt-4">
  <thead>
    <tr>
      <th scope="col">id_membre</th>
      <th scope="col">pseudo</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">email</th>
      <th scope="col">civilite</th>
      <th scope="col">statut</th>
      <th scope="col">date_enregistrement</th>
      <th scope="col">action</th>


    </tr>
  </thead>

  <?php foreach($arrayMembre as $values): ?>

  <tbody>
    <tr>
      <td><?= $values['id_membre']; ?></td>
      <td><?= $values['pseudo']; ?></td>
      <td><?= $values['mdp']; ?></td>
      <td><?= $values['nom']; ?></td>
      <td><?= $values['prenom']; ?></td>
      <td><?= $values['email']; ?></td>
      <td><?= $values['civilite']; ?></td>
      <td><?= $values['statut']; ?></td>
      <td><?= $values['date_enregistrement']; ?></td>

      <td><img src=" <?= $values['photo'] ?>" width="200"></td>
      <td><a class="btn btn-danger" href="?actions=delete&id=<?= $values['id_agence']; ?>">DELETE</a>
      <td><a class="btn btn-primary" href="?actions=details&id=<?= $values['id_agence']; ?>">DETAILS</a>
      <td><a class="btn btn-dark" href="a?actions=update&id=<?= $values['id_agence']; ?>">UPDATE</a>

    </tr>
    
  </tbody>

  <?php endforeach; ?>

</table>

<form method="POST" class="container mt-4">

    <input class="form-control" type="text" placeholder="id_membre" name="id_membre">
    <input class="form-control" type="text" placeholder="pseudo" name="pseudo">
    <input class="form-control" type="password" placeholder="mdp" name="mdp">
    <input class="form-control" type="text" placeholder="nom" name="nom">
    <input class="form-control" type="text" placeholder="prenom" name="prenom">
    <input class="form-control" type="text" placeholder="email" name="email">
    <input class="form-control" type="text" placeholder="civilite" name="civilite">

    <select name="civilité">
        <option value="">Femme</option>
        <option value="">Homme</option>
    </select>

    <select name="statut">
        <option value="">Membre</option>
        <option value="">Admin</option>
    </select>

    <input class="form-control" type="text" placeholder="statut" name="statut">
    <input class="form-control" type="text" placeholder="date_enregistrement" name="date_enregistrement">


    <button class="form-control btn btn-dark" name="valider_membre">Valider</button>

</form>






<?php require_once('./footer.php');?>
