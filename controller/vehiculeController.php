<?php

require_once('../utils/config.php'); // require_once permet d'inclure un fichier. 

ini_set('display_errors', '1'); // Permet d'afficher tous les messages d'erreurs.

// recupération des agences
function getAllAgence($sql)
{
  $request = $sql->prepare("SELECT * FROM agences");
  $request->execute(); // ETAPE SELECT (3) On exécute la requête préparée.
  $result = $request->fetchAll(PDO::FETCH_ASSOC); // ETAPE SELECT (4) On retourne le résultat de notre requête sous forme de tableau associatif grâce au PDO::FETCH_ASSOC.
  return $result;
}

function vehiculeDelete($sql, $id)
{
  // requete delete
  $request = $sql->prepare("DELETE FROM vehicule WHERE id_vehicule = ?");
  $request->execute([$id]);
  header('Location: vehicule.php');
}

function details($sql, $id)
{

  $request = $sql->prepare("SELECT vehicule.*, ville FROM vehicule 
  INNER JOIN agences USING(id_agence) WHERE id_vehicule = ?");
  $request->execute([$id]);
  $result = $request->fetch(PDO::FETCH_ASSOC);
  return $result;
  // requete details 
}

function update($sql, $values)
{
var_dump($values);
  $request = $sql->prepare("

UPDATE vehicule 
SET 
id_agence = :id_agence,
titre = :titre, 
marque = :marque, 
modele = :modele, 
description = :description, 
photo = :photo,
prix_journalier = :prix_journalier
WHERE id_vehicule = :id ");

  $request->bindParam(':id_agence', $values['id_agence']);
  $request->bindParam(':titre', $values['titre']);
  $request->bindParam(':marque', $values['marque']);
  $request->bindParam(':modele', $values['modele']);
  $request->bindParam(':prix_journalier', $values['prix_journalier']);
  $request->bindParam(':description', $values['description']);
  $request->bindParam(':photo', $values['photo']);
  $request->bindParam(':id', $values['id_vehicule']);


  $request->execute();
  header('Location: vehicule.php');


}

$arrayAgences = getAllAgence($database);





if (isset($_POST['valider_vehicule'])) {

  createVehicule($_POST, $database);
}

if (isset($_POST['valider_update'])) {

  update($database, $_POST);
}


function createVehicule($values, $sql) //ETAPE INSERT INTO (6)
{
  //INSERT INTO


  $request = $sql->prepare("INSERT INTO vehicule VALUES (NULL, :id_agence, :titre, :marque, :modele, :description, :photo, :prix_journalier) ");
  $request->bindParam(':id_agence', $values['id_agence']);
  $request->bindParam(':titre', $values['titre']); // ETAPE INSERT INTO (8) On utilise la function bindParam pour lier un paramètre a une variable spécifique afin de lui transmettre des données.
  $request->bindParam(':marque', $values['marque']);
  $request->bindParam(':modele', $values['modele']);
  $request->bindParam(':description', $values['description']);
  $request->bindParam(':photo', $values['photo']);
  $request->bindParam(':prix_journalier', $values['prix_journalier']);
  $request->execute(); // ETAPE INSERT INTO (9) On exécute la requête préparée.
  // header('Location: agence.php');


}


function getVehicule($sql) // ETAPE SELECT (1)
{
  $request = $sql->prepare("SELECT agences.ville, id_vehicule, vehicule.titre, vehicule.marque, vehicule.modele, vehicule.description, vehicule.photo, vehicule.prix_journalier FROM vehicule INNER JOIN agences USING(id_agence) WHERE vehicule.id_agence = agences.id_agence"); // ETAPE SELECT (2) On utilise la methode prépare de notre objet ($sql) pour écrire notre requête de type SELECT.
  $request->execute(); // ETAPE SELECT (3) On exécute la requête préparée.
  $result = $request->fetchAll(PDO::FETCH_ASSOC); // ETAPE SELECT (4) On retourne le résultat de notre requête sous forme de tableau associatif grâce au PDO::FETCH_ASSOC.
  return $result;
}




$arrayVehicule = getVehicule($database);



if (isset($_GET['actions'])) {
  $actions = $_GET['actions'];
} else {
  $actions = NULL;
}



// lien supprimer (DELETE)
if ($actions == 'delete') {
  vehiculeDelete($database, $_GET['id']);
}

// lien details
if ($actions == 'details') {
  $arrayDetails = details($database, $_GET['id']);
}

// lien update

if ($actions == 'update') $arrayUpdate = details($database, $_GET['id']);
