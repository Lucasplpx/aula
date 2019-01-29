<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuario;
use \Models\Categorie;

class CategoriesController extends Controller {

	private $user;
	private $arrayInfo;

	public function __construct(){
		$this->user = new Usuario();

		if(!$this->user->isLogged()){
			header("Location: ".BASE_URL."login");
			exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'categories'
		);


	}

	public function index() {
        $array = array(
            'user' => $this->user,
            'list' => array()
		);
		
		$c = new Categorie();

		$array['list'] = $c->getCategories();

		$this->loadTemplate('categories', $array);
	}

}