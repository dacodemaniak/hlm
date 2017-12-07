<?php
/**
* @name Connect.class.php Instance de connexion PDO à une base MySQL
* @author GrEta - Déc. 2017
* @package /_Classes/DAL/MySQL/PDO
* @version 0.1.0
**/

// Charge l'interface de définition des connexions
require_once(dirname(__FILE__) . "/../../iConnect.class.php");

class Connect implements iConnect {
	
	/**
	 * Objet JSON contenant les informations de connexion
	 * @var JSONObject
	 */
	private $config;
	
	/**
	 * Instance de connexion à la base de données mySQL
	 * @var PDO
	 */
	private $instance;
	
	/**
	 * Constructeur de la classe
	 * @param JSONObject $config : données d'accès à la base de données
	 */
	public function __construct($config){
		$this->config = $config;
		
		$this->connect();
	}
	
	/**
	 * Retourne l'instance de connexion à la base de données MySQL définie
	 * {@inheritDoc}
	 * @see iConnect::getInstance()
	 */
	public function getInstance(){
		return $this->instance;
	}
	
	/**
	 * Connexion à la base de données
	 */
	public function connect(){
		$dsn = strtolower($this->config->dbms) . ":host=" . $this->config->address . ";";
		$dsn .= "port=" . $this->config->port . ";";
		$dsn .= "dbname=" . $this->config->dbname;
		
		try{
			$this->instance = new \PDO($dsn, $this->config->user, $this->config->password);
		} catch(PDOException $e){
			die("Impossible de se connecter à la base de données : " . $e->getMessage());
		}
	}
}