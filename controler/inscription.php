<?php

session_start();

require_once '../class/form.php';
require_once 'dbconnect.php';

$forms = new Form();
if ($forms->isValid($_POST)){
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if ($_POST['password'] === $_POST['confirmer']){
    	$stmt_1 = $bdd->prepare("SELECT email_user FROM user WHERE email_user = :mail");
        $stmt_1->bindParam("mail", $_POST['email']);
        $stmt_1->execute();
        $result = $stmt_1->fetchColumn();   
        if ($result == $_POST['email']) {
            $_SESSION['error'] = "Email déjà utiliser !!";
            header('Location:http://localhost/forum/view/register.php');
            die();
        }
        $stmt = $bdd->prepare("INSERT INTO user (email_user, nom_user, password_user) VALUES (:mail, :username, :pwd)");
        $stmt->bindParam("mail", $_POST['email']);
        $stmt->bindParam("username", $_POST['username']);
        $stmt->bindParam("pwd", $password_hash);
        $stmt->execute();
        $_SESSION['succes'] = "Vous vous êtes bien inscrit !";
        header('Location:http://localhost/forum/index.php');
        die();
    }
}
else {
    header('Location:http://localhost/forum/view/register.php');
}