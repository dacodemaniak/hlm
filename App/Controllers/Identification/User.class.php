<?php
/**
* @name User.class.php Classe de définition des utilisateurs
* @author GrEta - Déc. 2017
* @package /App/Controllers/Identification
* @version 0.1.0
**/
class User {
	private $name;
	
	/**
	 * Définit ou retourne le nom de l'utilisateur
	 * @param string $name
	 * @return User|string
	 */
	public function name($name=null){
		if(!is_null($name)){
			$this->name = $name;
			return $this;
		}
		
		return $this->name;
	}
}