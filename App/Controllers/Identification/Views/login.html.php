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
				<form method="post" action="index.php?mod=identification" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<fieldset>
						<legend>
							Identifiez-vous
						</legend>
						<div class="form-group">
							<label class="label">Identifiant :</label>
							<input type="text" name="login" class="form-control">
						</div>
						<div class="form-group">
							<label class="label">Mot de passe :</label>
							<input type="password" name="password" class="form-control">
						</div>
					</fieldset>
					<fieldset>
						<button type="submit" name="identification" class="btn btn-primary">Connexion</button>
						<button type="reset" name="cancel" class="btn btn-warning">Effacer</button>
					</fieldset>
				</form>
			</section>
		</div>
	</body>
</html>