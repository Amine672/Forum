<?php
	session_start();
	
	if(isset($_SESSION['error'])){
		$err = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	
	if(isset($_SESSION['succes'])){
		$succes = $_SESSION['succes'];
		unset($_SESSION['succes']);
	}
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" media="screen" href="view/style.css" />
</head>
<body>
    <form action="controler/login.php" method="post">
		<h4>Connectez-vous</h4>
		<?php
			if (isset($err)){
				foreach($err as $value){
					echo '<p id="errmsg">'.$value.'</p>';
				}
			}
		?>
        <?php 
            echo (isset($succes)) ?  '<p id="errmsg">'.$succes.'</p>' : "";
        ?>
		<p>
            <input type="email" name="email" placeholder="Votre email...">
        </p>
		<p>
            <input type="password" name="password" placeholder="Votre mot de passe...">
        </p>
		<input type="submit" value="Connexion">
	</form>
	<br>
	<p> Vous n'avez pas de compte ?
		<a href="./view/register.php">Inscrivez vous</a>
	<p>
</body>
</html>