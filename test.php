<?php
require("_Classes/Sessions/Sessions.class.php");

$session = new Sessions();
$session->addItem("toto", "Hello Session");
$session->addItem("nom", "Jean-Luc");
$session->removeItem("login");
echo $session->toto;

// Méthode sans Iterator
foreach ($_SESSION as $key => $value){
	echo $key . " = " . $value . "<br>";
}

// Méthode avec Iterator
echo "<p>Boucle avec l'interface Iterator, on boucle sur l'objet</p>";
foreach ($session as $key => $value){
	echo $key . $value . "<br>";
}
