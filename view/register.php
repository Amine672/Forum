<?php
    session_start();
    if(isset($_SESSION['error'])){
        $err = $_SESSION['error'];
        unset($_SESSION['error']);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="../controler/inscription.php" method="post">
			<h4>Inscription</h4>
			<?php 
				if (isset($err)){
					foreach($err as $value){
						echo '<p id="errmsg">'.$value.'</p>';
					}
				}				 
			?>
			<p>
                <input type="text" name="username" placeholder="Votre Pseudo...">  
            </p>
			<p>
                <input type="email" name="email" placeholder="Votre email...">
            </p>
			<p>
                <input type="password" name="password" placeholder="Votre mot de passe...">
            </p>
            <p>
                <input type="password" name="confirmer" placeholder="Repeter le mot de passe...">
            </p>
			<p>
                <input type="checkbox" name="check"> Valider le formulaire d'inscription
            </p>            
			<input type="submit" value="Register">
		</form>
	</body>
</html>