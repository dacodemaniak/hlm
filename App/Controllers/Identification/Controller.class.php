<?php
/**
* @name Controller.class.php Contrôleur de l'identification de l'utilisateur
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
	 * Instancie l'objet Utilisateur, traite la requête et détermine le template à charger
	 */
	protected function process(){
		// On vérifie que le formulaire a bien été saisi
		if(array_key_exists("login", $_POST) && array_key_exists("password", $_POST)){
			// Okay, login et mot de passe ont été transmis
			
			// Charge la classe de modèle Utilisateur
			require_once(dirname(__FILE__) . "/../../../_Classes/Models/Utilisateur.class.php");
			
			// Instancie un objet utilisateur
			$user = new Utilisateur();
			$user->login = $_POST["login"];
			$user->password = $_POST["password"];
			
			// Instance de connexion à la base de données
			require_once(dirname(__FILE__) . "/../../../_Classes/DAL/DAL.class.php");
			$dal = new DAL();
			$instance = $dal->getInstance();
			
			// Exécute la requête
			$result = $instance->query($user->selectBy(), \PDO::FETCH_OBJ);
			
			// Parcourt le jeu de résultat
			if($data = $result->fetch()){
				// Instancie un objet Utilisateur
				require_once(dirname(__FILE__) . "/User.class.php");
				$user = new User();
				$user->name($data->name);
				
				// Ajoute un objet utilisateur dans la session
				require_once(dirname(__FILE__) . "/../../../_Classes/Sessions/Sessions.class.php");
				$session = new Sessions();
				$session->addItem("user", $user);
				$this->template = dirname(__FILE__) . "/../Home/Views/home.html.php";
			} else {
				// L'utilisateur n'a pas été identifié
				$this->template = dirname(__FILE__) . "/../Home/Views/badhome.html.php";
			}
			
		}
	}
	
	
	/**
	 * Définit le nom de la vue à charger
	 */
	protected function setTemplate(){
		$this->template = dirname(__FILE__) . "/Views/login.html.php";
	}
}