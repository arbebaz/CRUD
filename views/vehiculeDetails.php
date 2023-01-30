<?php require_once('../controller/vehiculeController.php');?>
<?php require_once('./header.php');?>
    
<h1 class="p-4">Details</h1>


<div class="card text-center position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
  <img src=" <?= $arrayDetails['photo'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?= $arrayDetails['titre']; ?></h5>
    <p class="card-text"><?= $arrayDetails['description']; ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?= $arrayDetails['marque']; ?></li>
    <li class="list-group-item"><?= $arrayDetails['modele']; ?></li>
    <li class="list-group-item"><?= $arrayDetails['prix_journalier']; ?></li>
    <li class="list-group-item"><?= $arrayDetails['ville']; ?></li>
  </ul>
  <div class="card-body">
  <p class="card-text">ID : <?= $arrayDetails['id_vehicule']; ?></p>
  </div>
</div>







<?php require_once('./footer.php');?>
