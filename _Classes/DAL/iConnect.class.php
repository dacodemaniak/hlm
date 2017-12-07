<?php
/**
* @name iConnect.class.php Interface de définition des connexions DBMS
* @author GrEta - Déc. 2017
* @package /_Classes/DAL
* @version 0.1.0
**/
interface iConnect {
	
	/**
	 * Méthode de connexion à la base de données
	 */
	public function connect();
	
	/**
	 * Méthode de récupération de l'instance de connexion
	 */
	public function getInstance();
}