<?php
require_once 'dbconnect.php';
session_start();

$stmt = $bdd->prepare("SELECT * FROM film");
$stmt->execute();
$result = $stmt->fetchAll();
