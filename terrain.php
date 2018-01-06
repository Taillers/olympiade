<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HTML</title>
		<meta name="author" content="NIKIEMA.DELWENDEARIA" />
		<!-- Date: 2017-12-19 -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function (){
		  $(document).keyup(function(){
		  	if ($('#nom').val() != '' || $('#activite').val() != '' ){
		  	$('#submit').removeAttr('disabled');
		  	}
		  })
		})
	</script>
	</head>
	<body>
<form method="POST" action="index_terrain.php">
	<center>
		<H1>Olympiade 2017</H1>
		<p>Entrer une nouvelle activité</p>		
		<input type="text" placeholder="" pattern="[A-Za-z]{1,}" name="activite" ><br />
		<p>Entrer un terrain</p>
		<input type="text" placeholder="" name="terrain" id="nom"><br /><br />
		<input  id="submit" type="submit" name="créer" value="Entrer" disabled="disabled" /><br /><br />
			
	</form>
	</body>
</html>

