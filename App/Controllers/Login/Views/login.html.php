<?php
/**
* @name login.html.php Vue du formulaire d'identification
* @author GrEta - Déc. 2017
* @version 0.1.0
**/
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<title>Office HLM - Identification</title>
		
		<link href="_assets/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="_assets/node_modules/animate.css/animate.min.css" rel="stylesheet">
		<link href="_assets/css/custom.css" rel="stylesheet">
	</head>
	
	<body>
		<div class="page container-fluid">
			<header class="row">
				<div class="logo col-lg-2 col-md-2 col-sm-12 col-xs-12">
				</div>
				
				<h1 class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					Office HLM - Identification
				</h1>
			</header>
			
			<section class="row">
				<form id="login" method="post" action="index.php?mod=identification" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-inline">
					<fieldset class="container">
						<legend>
							Identification
						</legend>
						<div class="form-group row">
							<label class="label col-lg-6 col-md-6 col-sm-6 col-xs-6">Identifiant :</label>
							<input type="text" name="login" class="form-control col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Votre identifiant">
						</div>
						<div class="form-group row">
							<label class="label col-lg-6 col-md-6 col-sm-6 col-xs-6">Mot de passe :</label>
							<input type="password" name="password" class="form-control col-lg-6 col-md-6 col-sm-6 col-xs-6">
						</div>
					</fieldset>
					<fieldset class="row">
						<button type="submit" disabled name="identification" class="btn btn-success col-md-2 col-md-offset-2">Connexion</button>
						<button type="reset" disabled name="cancel" class="btn btn-warning col-md-2 col-md-offset-1">Effacer</button>
					</fieldset>
				</form>
			</section>
		</div>
		
		<!--  Charge les javascripts pour la gestion côté client -->
		<script src="_assets/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="_assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<script src="_assets/node_modules/app/_app.js"></script>
	</body>
</html>