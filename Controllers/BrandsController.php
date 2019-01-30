<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuario;
use \Models\Brand;

class BrandsController extends Controller {

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
			'menuActive' => 'brands'
		);


	}

	public function index() {
        $array = array(
            'user' => $this->user,
            'list' => array()
		);
		
		$b = new Brand();

		$array['list'] = $b->getAll();

		$this->loadTemplate('brands', $array);
	}

}