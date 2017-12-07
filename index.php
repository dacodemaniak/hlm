<?php
/**
* @name index.php Dispatcher des requêtes http
* @author GrEta - Déc. 2017
* @version 0.1.0
**/

ini_set("display_errors", true);
error_reporting(E_ALL);

// Charge la classe de gestion de la session
require_once("_Classes/Sessions/Sessions.class.php");

// Instancie un nouvel objet pour la gestion de la session
$session = new Sessions();

if(!is_null($session->user)){
	// Un utilisateur a été identifié... on charge la vue "home"
	if(array_key_exists("mod", $_GET)){
		// Charge la classe correspondante
		$classFile = "App/Controllers/" . ucfirst($_GET["mod"]) . "/Controller.class.php";
		require_once($classFile);
	} else {
		// Aucun module défini, on charge le contrôleur de la page d'accueil
		require_once("App/Controllers/Home/Controller.class.php");
	}
} else {
	// On détermine si un module particulier a été demandé
	if(array_key_exists("mod", $_GET)){
		// Charge la classe correspondante
		$classFile = "App/Controllers/" . ucfirst($_GET["mod"]) . "/Controller.class.php";
		require_once($classFile);
	} else {
		// Aucun module défini, on charge le contrôleur par défaut
		require_once("App/Controllers/Login/Controller.class.php");
	}
}

// Instancie le contrôleur
$controller = new Controller();
$controller->render();