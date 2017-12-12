<?php
/**
* @name Sessions.class.php Gestion de la session utilisateur PHP
* @author GrEta - Déc. 2017
* @package /_Classes/Sessions
* @implements Iterator
* @version 0.1.0
**/

class Sessions implements \Iterator {
	/**
	 * Index courant du tableau $_SESSION
	 * @var int
	 */
	private $indice;
	
	/**
	 * Clés du tableau $_SESSION
	 * @var array
	 */
	private $keys = array();
	
	/**
	 * Constructeur de la classe courante
	 */
	public function __construct(){
		// Démarre la session
		@session_start();
		
		// Récupère les clés du tableau de session
		$this->keys = array_keys($_SESSION);
	}
	
	/**
	 * Ajoute un élément dans la session
	 * @param string $key
	 * @param mixed $value
	 * @return Sessions
	 */
	public function addItem($key, $value){
		if(!in_array($key, $this->keys)){
			$this->keys[] = $key;
		}
		if(is_object($value)){
			$value = serialize($value);
		}
		$_SESSION[$key] = $value; // Ajoute la clé et la valeur associée dans la session
		
		return $this;
	}
	
	/**
	 * Supprime une clé / valeur dans la session
	 * @param unknown $key
	 * @return Sessions
	 */
	public function removeItem($key){
		if(in_array($key, $this->keys)){
			$_SESSION[$key] = null;
			unset($_SESSION[$key]);
			$this->keys = array_keys($_SESSION);
		}
		return $this;
	}
	
	/**
	 * Retourne l'état de la variable de session
	 * @return boolean
	 */
	public function hasItems(){
		return count($_SESSION) ? true : false;
	}
	
	/**
	 * Retourne la valeur de la clé du tableau de session
	 * @param string $key
	 * @return null | mixed
	 */
	public function __get($key){
		if(in_array($key, $this->keys)){
			if($key == "user"){
				return unserialize($_SESSION[$key]);
			}
			
			return $_SESSION[$key];
		}
	}
	/**
	 *
	 * {@inheritDoc}
	 * @see Iterator::current()
	 */
	public function current(){
		return $_SESSION[$this->keys[$this->indice]];
	}
	
	/**
	 * Incrémente l'indice
	 * {@inheritDoc}
	 * @see Iterator::next()
	 */
	public function next(){
		$this->indice++;
	}
	
	/**
	 * Retourne la clé de la collection à l'indice concerné
	 * {@inheritDoc}
	 * @see Iterator::key()
	 */
	public function key(){
		return $this->keys[$this->indice];
	}
	
	/**
	 * Détermine la validité du parcours
	 * {@inheritDoc}
	 * @see Iterator::valid()
	 */
	public function valid(){
		return $this->indice <= (count($_SESSION) - 1);
	}
	
	/**
	 * Réinitialise l'indice au début du tableau à parcourir
	 * {@inheritDoc}
	 * @see Iterator::rewind()
	 */
	public function rewind(){
		$this->indice = 0;
	}
}