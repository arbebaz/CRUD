<?php 

require_once('../utils/config.php'); // require_once permet d'inclure un fichier. 

ini_set('display_errors', '1'); // Permet d'afficher tous les messages d'erreurs.



if(isset($_POST['valider_membre'])) {


/* 
     ETAPE INSERT INTO (5) 
      Quand on clic sur le button valider de notre formulaire, 
      on appel notre function (post) en lui transmettant les données récupérées de notre formulaire qui ont été stocké dans la super global $_POST,
      et on lui transmet aussi notre objet $pdo, qui nous permettra d'écrire nos requêtes sql.
    */

    create($_POST, $database);
    // var_dump($_POST);
    
}


function create($values, $sql) //ETAPE INSERT INTO (6)
{
//INSERT INTO

var_dump($values);
$request = $sql->prepare("INSERT INTO membre VALUES (NULL, :pseudo, :mdp, :nom, :prenom, :email, :civilite, :statut, CURDATE() ) ");
$request->bindParam(':pseudo', $values['pseudo']); // ETAPE INSERT INTO (8) On utilise la function bindParam pour lier un paramètre a une variable spécifique afin de lui transmettre des données.
$request->bindParam(':mdp', $values['mdp']); 
$request->bindParam(':nom', $values['nom']); 
$request->bindParam(':prenom', $values['prenom']); 
$request->bindParam(':email', $values['email']); 
$request->bindParam(':civilite', $values['civilité']); 
$request->bindParam(':statut', $values['statut']); 
$request->execute(); // ETAPE INSERT INTO (9) On exécute la requête préparée.
// header('Location: agence.php');


}

function getMembre($sql) // ETAPE SELECT (1)
{
  $request = $sql->prepare("SELECT * FROM membre"); // ETAPE SELECT (2) On utilise la methode prépare de notre objet ($sql) pour écrire notre requête de type SELECT.
  $request->execute(); // ETAPE SELECT (3) On exécute la requête préparée.
  $result =  $request->fetchAll(PDO::FETCH_ASSOC); // ETAPE SELECT (4) On retourne le résultat de notre requête sous forme de tableau associatif grâce au PDO::FETCH_ASSOC.
    return $result;
}

$arrayMembre = getMembre($database);










