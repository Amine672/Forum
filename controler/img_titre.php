<?php

require_once 'dbconnect.php';
session_start();

$stmt = $bdd->prepare("SELECT f.nom_film 
FROM film f, user_film_note uf, user u
WHERE u.id_user = uf.id_user
AND f.id_film = uf.id_film
AND u.id_user = :id ");
$stmt->bindParam("id", $_SESSION['id']);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $film){
    $nom = $film["nom_film"];
    echo "<div class='img_titre'>".$nom."</div>";  
}