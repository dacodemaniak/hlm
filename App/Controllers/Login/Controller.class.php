<?php
/**
* @name Controller.class.php Contrôleur de la page d'accueil connectée
* @author GrEta - Déc. 2017
* @package /App/Controllers/Home
* @version 0.1.0
**/
class Controller {
	/**
	 * Nom de la vue à charger
	 * @var string
	 */
	private $template;
	
	/**
	 * Constructeur du contrôleur
	 */
	public function __construct(){
		$this->setTemplate();
		
		$this->process();

	}
	
	/**
	 * Charge la vue correspondante
	 */
	public function render(){
		include($this->template);
	}
	
	/**
	 * Coeur du contrôleur
	 */
	protected function process(){}
	
	
	/**
	 * Définit le nom de la vue à charger
	 */
	protected function setTemplate(){
		$this->template = dirname(__FILE__) . "/Views/login.html.php";
	}
}