<?php 

require_once('../utils/config.php'); // require_once permet d'inclure un fichier. 

ini_set('display_errors', '1'); // Permet d'afficher tous les messages d'erreurs.

/* 
ETAPE INSERT INTO (4) 
  Cette ligne nous permet de savoir si on clic sur le button (valider) de notre formulaire.
isset vérifie si quelque choses est définit */


if(isset($_POST['valider_agence'])) {


/* 
     ETAPE INSERT INTO (5) 
      Quand on clic sur le button valider de notre formulaire, 
      on appel notre function (post) en lui transmettant les données récupérées de notre formulaire qui ont été stocké dans la super global $_POST,
      et on lui transmet aussi notre objet $pdo, qui nous permettra d'écrire nos requêtes sql.
    */

    create($_POST, $database);
    
}


if (isset($_POST['valider_update'])){

  update($database, $_POST);
}

/* 
ETAPE INSERT INTO (6) 
  On crée notre function (post) avec deux arguments ($values, $sql) qui réceptionneront $_POST et $pdo, 
  ces deux variables sont transmissent dans l'étape (5).
  $values deviendra alors une copie de $_POST & $sql deviendra une copie de $pdo.
*/

function create($values, $sql) //ETAPE INSERT INTO (6)
{
//INSERT INTO


$request = $sql->prepare("INSERT INTO agences VALUES (NULL, :titre, :adresse, :ville, :cp, :description, :photo) ");
$request->bindParam(':titre', $values['titre']); // ETAPE INSERT INTO (8) On utilise la function bindParam pour lier un paramètre a une variable spécifique afin de lui transmettre des données.
$request->bindParam(':adresse', $values['adresse']); 
$request->bindParam(':ville', $values['ville']); 
$request->bindParam(':cp', $values['cp']); 
$request->bindParam(':description', $values['description']); 
$request->bindParam(':photo', $values['photo']); 
$request->execute(); // ETAPE INSERT INTO (9) On exécute la requête préparée.
// header('Location: agence.php');


}

// ETAPE SELECT (1) 
//   On crée notre function (getAll) avec un argument ($sql) qui réceptionnera $pdo, 
//   cette variable sera transmisse à l'étape SELECT (5).
//   $sql deviendra alors une copie de $pdo.
// */

function getAgence($sql) // ETAPE SELECT (1)
{
  $request = $sql->prepare("SELECT * FROM agences"); // ETAPE SELECT (2) On utilise la methode prépare de notre objet ($sql) pour écrire notre requête de type SELECT.
  $request->execute(); // ETAPE SELECT (3) On exécute la requête préparée.
  $result =  $request->fetchAll(PDO::FETCH_ASSOC); // ETAPE SELECT (4) On retourne le résultat de notre requête sous forme de tableau associatif grâce au PDO::FETCH_ASSOC.
    return $result;
}

function getDelete($sql, $id)
{
// requete delete
    $request = $sql->prepare("DELETE FROM agences WHERE id_agence = ?");
    $request->execute([$id]);
    header('Location: agence.php');
     
}

function details($sql, $id)
{

    $request = $sql->prepare("SELECT * FROM agences WHERE id_agence = ?");
    $request->execute([$id]);
    $result = $request->fetch(PDO::FETCH_ASSOC);
    return $result;
    // requete details 
}

function update($sql, $values)
{

  $request = $sql->prepare("

UPDATE agences 
SET 
titre = :titre, 
adresse = :adresse, 
ville = :ville, 
cp = :cp, 
description = :description, 
photo = :photo
WHERE id_agence = :id ");

$request->bindParam(':id', $values['id_agence']);
$request->bindParam(':titre', $values['titre']);
$request->bindParam(':adresse', $values['adresse']);
$request->bindParam(':ville', $values['ville']);
$request->bindParam(':cp', $values['cp']);
$request->bindParam(':description', $values['description']);
$request->bindParam(':photo', $values['photo']);

$request->execute();
header('Location: agence.php');


}

$arrayAgence = getAgence($database);





// ------------------ ACTION - $_GET

/* 
  ETAPE ACTION  
    Si le param actions est défini dans l'url (?actions) 
    On enregistre sa valeur dans la variable $actions
    Sinon on enregistre NULL  
    Cela sert à ne pas avoir d'erreur dans le cas ou l'internaute modifie le param (?actions) 
    qui se trouve dans l'url, par autre chose.

  VERSION TERNAIRE
    $actions = isset($_GET['actions']) ? $_GET['actions'] : NULL;

  VERSION CLASSIC

    if(isset($_GET['actions']))
    {
      $actions = $_GET['actions'];
    }
    else
    {
      $actions = NULL;
    }
*/


if(isset($_GET['actions']))
{
  $actions = $_GET['actions'];
}
else
{
  $actions = NULL;
}


// lien supprimer (DELETE)
if ($actions == 'delete') 
{
    getDelete($database, $_GET['id']);
}

// lien details
if ($actions == 'details') 
{
   $arrayDetails = details($database, $_GET['id']);
}


// lien update

if ($actions == 'update') $arrayUpdate = details($database, $_GET['id']); 
