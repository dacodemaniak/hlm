<?php
/**
* @name Groupe.class.php Définition de l'entité physique groupes
* @author GrEta - Déc. 2017
* @package /_Classes/Models
* @version 0.1.0
**/

// Requiert la classe parente abstraite Entity
require_once(dirname(__FILE__) . "/../Entities/Entity.class.php");

class Groupe extends Entitity{
	
	/**
	 * Constructeur de la classe Utilisateur
	 */
	public function __construct(){
		// Détermine le nom de l'entité à partir du nom de la classe
		$this->name = strtolower(__CLASS__) . "s";
		
		// Détermine l'alias à partir du nom de la table
		$this->alias = strtoupper(substr($this->name,0,1));
	}
	
	/**
	 * Définit le schéma de l'entité physique Utilisateur
	 * {@inheritDoc}
	 * @see Entitity::schema()
	 */
	protected function schema(){
		$this->schema = array(
			"id" => array(
				"type" => "int",
				"primary" => true,
				"autoincrement" => true,
				"null" => false,
				"value" => null
			),
			"libelle" => array(
				"type" => "varchar",
				"length" => 255,
				"primary" => false,
				"null" => false,
				"value" => null
			),
			"login" => array(
				"type" => "varchar",
				"length" => 25,
				"primary" => false,
				"null" => false,
				"value" => null
			),
			"password" => array(
				"type" => "varchar",
				"length" => 32,
				"primary" => false,
				"null" => false,
				"value" => null
			),
			"groupe_id" => array(
				"type" => "int",
				"primary" => false,
				"fk" => true,
				"null" => false,
				"value" => null,
				"entity" => "Groupe"
			)
		);
	}
}