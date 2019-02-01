<?php
session_start();
    require_once 'dbconnect.php';
    require_once '../class/form.php';

	$form = new Form();
	if ($form->isValid($_POST)){
		$stmt = $bdd->prepare("SELECT password_user, nom_user, id_user FROM user WHERE email_user = :mail");
		$stmt->bindParam("mail", $_POST['email']);
		$stmt->execute();
		if ($result = $stmt->fetch()){
			$result = array_values($result);
			if (password_verify($_POST['password'], $result[0])){
				$_SESSION['user'] = $result[1];
				$_SESSION['id'] = $result[2];
				header("Location:http://localhost/forum/view/home.php");
				die();
			}
		}		
		else {
			header('Location:http://localhost/forum/index.php');	
			die();
		}
	}
	else {
		header('Location:http://localhost/forum/index.php');
		die();	
	}
