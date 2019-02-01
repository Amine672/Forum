<?php
require_once 'dbconnect.php';
session_start();

$stmt = $bdd->prepare("SELECT uf.id_film, uf.nb_user_note 
FROM film f, user_film_note uf, user u
WHERE u.id_user = uf.id_user
AND f.id_film = uf.id_film
AND u.id_user = :id ");
$stmt->bindParam("id", $_SESSION['id']);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $note){
    $nb = $note["nb_user_note"];
    echo "<div class='img_note'>Vous avez donner la note de  ".$nb."/10</div>";  
}