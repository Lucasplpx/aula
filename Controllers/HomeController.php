<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuario;

class HomeController extends Controller {

	private $user;

	public function __construct(){
		$this->user = new Usuario();

		if(!$this->user->isLogged()){
			header("Location: ".BASE_URL."login");
			exit;
		}


	}

	public function index() {
		$array = array(
			'user' => $this->user
		);

	

		$this->loadTemplate('home', $array);
	}

}