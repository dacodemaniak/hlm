<?php
/**
* @name DAL.class.php Database Abstraction Layer
* @author GrEta - Déc. 2017
* @package /_classes/DAL
* @version 0.1.0
**/

class DAL {
	/**
	 * Configuration de l'accès à la base de données
	 * @var JSONObject
	 */
	private $config;
	
	/**
	 * Instance de connexion à la base de données
	 * @var Object
	 */
	private $dbInstance;
	
	// Instance de connexion à la base de données
	private $connexion;
	
	/**
	 * Constructeur de la classe
	 * Lit le fichier de configuration JSON et instancie la classe concernée
	 */
	public function __construct(){
		$this->readConfiguration();
		
		if(!is_null($this->config)){
			// Détermine la classe à charger
			$className = dirname(__FILE__) . "/" . $this->config->dbms . "/" . strtoupper($this->config->type) . "/Connect.class.php";
			
			// Requiert la classe de connexion
			require_once($className);
			
			// Instancie la connexion elle-même
			$this->connexion = new Connect($this->config);
		}
	}
	
	/**
	 * Retourne l'instance de connexion courante à la base de données
	 * @return Object
	 */
	public function getInstance(){
		return $this->connexion->getInstance();
	}
	
	/**
	 * Lit et définit la configuration de la connexion à la base de données
	 */
	private function readConfiguration(){
		$jsonConfig = file_get_contents(dirname(__FILE__) . "/../../_config/dal.json");
		$this->config = json_decode($jsonConfig);
	}
}