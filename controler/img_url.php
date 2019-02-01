<?php
require_once 'dbconnect.php';
session_start();

$stmt = $bdd->prepare("SELECT f.img_film
FROM film f, user u, user_film_note uf 
WHERE uf.id_user = u.id_user
AND f.id_film = uf.id_film 
AND u.id_user = :id");
$stmt->bindParam("id", $_SESSION['id']);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $img){
    foreach($img as $url){
        echo "<img class='img_url' src='".$url."'/>";
    }
}
