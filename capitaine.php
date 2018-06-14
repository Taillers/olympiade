<?php
// l'inscription du capitaine
   		session_start();
		$oneError = "";
		
	if(isset($_POST['nom']))
    {
        $_SESSION['nom'] = $_POST['nom'];
    }
	else
	{
		$oneError .= "Vous devez préciser en quelle année se passe l'olympiade.<br/>";
	}
	
			{
		$_SESSION["error"] = $oneError;
		include("gerer_equipe.php");
	}
?>

