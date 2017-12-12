<?php
/**
* @name login.ajax.php Service d'identification Ajax
* @author GrEta - Déc. 2017
* @package /App/Controllers/Login
* @version 0.1.0
**/

// Récupération des données transmises par l'appel Ajax
$login = $_POST["login"];
$password = $_POST["password"];

// A partir de là, on peut utiliser nos classes pour traiter la requête
require_once(dirname(__FILE__) . "/../Identification/Controller.class.php");
$controller = new Controller();

// Pour tester, on prépare le tableau qui sera retourné au script d'appel Ajax
$result = array(
	"statut" => $controller->isAuthenticate() ? 1 : 0,
	"datas" => array(
		"route" => "/index.php"
	)
);

// On passe les en-têtes JSON
header("Content-Type: text/json");

echo json_encode($result);