<?php
/**
* @name home.html.php Vue de la page d'accueil "connectée"
* @author GrEta - Déc. 2017
* @version 0.1.0
**/
// Charge la classe de gestion de la session
require_once(dirname(__FILE__) . "/../../../../_Classes/Sessions/Sessions.class.php");
require_once(dirname(__FILE__) . "/../../Identification/User.class.php");

$session = new Sessions();
$user = $session->user;
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<title>Office HLM - Accueil</title>
		
		<link href="_assets/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	
	<body>
		<div class="page container-fluid">
			<header class="row">
				<div class="logo col-lg-2 col-md-2 col-sm-12 col-xs-12">
				</div>
				
				<h1 class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					Office HLM - Accueil
				</h1>
				
				<div class="login col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<?php echo $user->name(); ?>
					<i class="glyphicon glyphicon-log-out"></i>
				</div>
				
			</header>
		</div>
		
		<!--  Charge les javascripts pour la gestion côté client -->
		<script src="_assets/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="_assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<script src="_assets/node_modules/app/_app.js"></script>
	</body>
</html>