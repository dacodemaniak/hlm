<?php
/**
* @name ManyToOne.class.php Gestion d'une jointure entre deux tables
* @author GrEta - Déc. 2017
* @package /_Classes/Entities
* @version 0.1.0
**/

class ManyToOne {
	/**
	 * Entité parente de la relation OneToMany
	 * @var Entity
	 */
	private $parent;
	
	/**
	 * Entité enfant de la relation OneToMany
	 * @var Entity
	 */
	private $child;
	
	/**
	 * Constructeur de la classe
	 * @param Entity $parent
	 * @param Entity $child
	 */
	public function __construct($parent, $child){
		$this->parent = $parent;
		$this->child = $child;
	}
	
	/**
	 * Crée la requête de jointure entre deux tables ManyToOne
	 * @return string
	 */
	public function selectAll(){
		
		// Initialise la requête SQL
		$statement = "SELECT ";
		
		// Boucle sur les schémas, pour déterminer les colonnes
		foreach ($this->child->getSchema() as $columnName => $definition){
			$statement .= $this->child->alias() . "." . $columnName . ",";
		}
		foreach ($this->parent->getSchema() as $columnName => $definition){
			$statement .= $this->parent->alias() . "." . $columnName . ",";
		}
		
		// Supprime la dernière virgule inutile
		$statement = substr($statement, 0, strlen($statement) - 1);
		
		// Définit la jointure parent.primary_key = child.foreign_key
		$statement .= " FROM ";
		$statement .= $this->parent->name() . " AS " . $this->parent->alias();
		$statement .= " INNER JOIN " . $this->child->name() . " AS " . $this->child->alias();
		
		$statement .= " ON " . $this->parent->alias() . "." . $this->parent->primaryKey() . "=" . $this->child->alias() . "." . $this->parent->foreignKey();
		
		return $statement;
	}
}