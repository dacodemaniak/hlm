<?php
/**
* @name Entity.class.php Abstraction de classes pour la gestion des entités
* @author GrEta - Déc. 2017
* @package _Classes/Entities
* @version 0.1.0
**/

abstract class Entitity {
	/**
	 * Nom de la table physique de référence
	 * @var string
	 */
	protected $name;
	
	/**
	 * Alias de la table physique de référence
	 * @var string
	 */
	protected $alias;
	
	/**
	 * Schéma de la table physique de référence
	 * @var array
	 */
	protected $schema;
	
	/**
	 * Définit ou retourne le nom de la table
	 * @param string $name
	 * @return Entitity|string
	 */
	public function name($name=null){
		if(!is_null($name)){
			$this->name = $name;
			return $this;
		}
		return $this->name;
	}
	
	/**
	 * Définit ou retourne l'alias de la table
	 * @param string $alias
	 * @return Entitity|string
	 */
	public function alias($alias = null){
		if(!is_null($alias)){
			$this->alias = $alias;
			return $this;
		}
		return $this->alias;
	}
	
	/**
	 * Retourne le nom de la clé primaire de l'entité physique courante
	 * @return string
	 */
	public function primaryKey(){
		foreach ($this->schema as $column => $definition){
			if($definition["primary"]){
				return $column;
			}
		}
	}
	
	/**
	 * Récupère la clé étrangère dans l'entité courante pour l'entité parente définie
	 * @param string $entityName
	 * @return null|string
	 */
	public function foreignKey($entityName){
		foreach ($this->schema as $column => $definition){
			if(array_key_exists("fk", $definition)){
				// Il s'agit bien d'une clé étrangère...
				if($definition["entity"] == $entityName){
					// Et il s'agit bien de l'entité concernée
					return $column;
				}
			}
		}
	}
	
	/**
	 * Définit la valeur de la colonne $columnName du schéma courant
	 * @param string $columnName
	 * @param mixed $value
	 * @return Entitity
	 */
	public function __set($columnName, $value){
		if(array_key_exists($columnName, $this->schema)){
			$this->schema[$columnName]["value"] = $value;
		}
		return $this;
	}
	
	/**
	 * Retourne le schéma de la table courante
	 * @return array
	 */
	public function getSchema(){
		return $this->schema;
	}
	
	/**
	 * Détermine la requête SELECT
	 * @return string
	 */
	public function selectAll(){
		// Chaîne de requête SQL
		$statement = "SELECT ";
		
		// Construit la requête à partir des informations du schéma
		$columns = array_keys($this->schema);
		$statement .= join(",", $columns);
		
		// Termine la requête
		$statement .= " FROM " . $this->name;
		
		return $statement;
	}
	
	/**
	 * Crée la requête avec une éventuelle clause de restriction
	 * @return string
	 */
	public function selectBy(){
		// Récupère la requête complète
		$statement = $this->selectAll();
		
		// Boucle sur le schéma pour vérifier les filtres
		$clause = "";
		foreach ($this->schema as $column => $definition){
			if(!is_null($definition["value"])){
				$clause .= $column . " = '" .  $definition["value"] . "' AND ";
			}
		}
		
		// Vérifie la longueur de la chaîne $clause
		if(strlen($clause)){
			// Supprime le dernier AND inutile
			$clause = substr($clause, 0, strlen($clause) - 5);
			$statement .= " WHERE " . $clause;
		}
		
		return $statement;
	}
	
	/**
	 * Définition du schéma de la table physique, voir les classes filles
	 */
	abstract protected function schema();
	
}