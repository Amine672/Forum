<?php
	require_once "../controler/get_films.php";

	if(!isset($_SESSION['user'])){
		header("Location:http://localhost/forum/index.php");
	}
	$films = $result;
	$_SESSION['films'] = $films;
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css" />		
	</head>
	<body>
		<h2>BIENVENUE <?php echo $_SESSION['user'];?></h2>
		<p>Bla bla bla</p>
		<div>
			<?php
				foreach ($films as $film){
					echo "<ul style='list-style:none'>";
						echo "<li>";
							echo "<a href='detail.php?id_film=".$film['id_film']."'>";
								echo "<img class='img_url' src='".$film['img_film']."'>";
							echo "</a>";
						echo "</li>";
						echo "<li>";
							echo $film['nom_film'];
						echo "</li>";
					echo "</ul>";
				}
			?>
		</div>
		<p>Cliquez içi pour afficher les films que vous avez notez</p>
		<button id="ici">ICI</button>
		<div id="titre"></div>
		<div id="url"></div>
		<div id="note"></div>
		<br>
		<a href="http://localhost/forum/controler/logout.php">Déconnexion</a>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
        </script>
		<script>
       		$("#ici").click(function(){
        		$.post(
        		    '../controler/img_titre.php',
        		    {
        		        ici: $("#ici").val()
        		    },
        		    function(data) {
        		        $("#titre").slideUp(500, function(){
        		            $(this).html(data);
        		        }).slideDown(500);
        		    }
        		);
    		});
       		$("#ici").click(function(){
        		$.post(
        		    '../controler/img_url.php',
        		    {
        		        ici: $("#ici").val()
        		    },
        		    function(data) {
        		        $("#url").slideUp(500, function(){
        		            $(this).html(data);
        		        }).slideDown(500);
        		    }
        		);
    		});
			$("#ici").click(function(){
        		$.post(
        		    '../controler/img_note.php',
        		    {
        		        ici: $("#ici").val()
        		    },
        		    function(data) {
        		        $("#note").slideUp(500, function(){
        		            $(this).html(data);
        		        }).slideDown(500);
        		    }
        		);
    		});			
		</script>
	</body>
</html>