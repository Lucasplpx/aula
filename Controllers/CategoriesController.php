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

		$array['list'] = $c->getAll();

		$this->loadTemplate('categories', $array);
	}


	public function add(){
		$array = array(
            'user' => $this->user,
			'list' => array(),
			'errorItems' => array()
		);
		
		$c = new Categorie();

		$array['list'] = $c->getAll();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
			$array['errorItems'] = $_SESSION['formError'];
			unset($_SESSION['formError']);
		}

		$this->loadTemplate('categories_add', $array);
	}

	public function add_action() {

		if(!empty($_POST['name'])){
			$name = $_POST['name'];
			$sub = '';

			if(!empty($_POST['sub'])){
				$sub = $_POST['sub'];
			}


			$cat = new Categorie();
			$cat->add($name, $sub);

			header("Location: ".BASE_URL."categories");
			exit;
		} else {
			$_SESSION['formError'] = array('name');

			header("Location: ".BASE_URL."categories/add");
			exit;
		}

	}


	public function edit($id){

		if(!empty(intval($id))){

			$array = array(
				'user' => $this->user,
				'list' => array(),
				'errorItems' => array(),
				'catInfo' => array()
			);
			
			$c = new Categorie();
	
			$array['list'] = $c->getAll();
			
			$array['catInfo'] = $c->getCategoria($id);

			if(count($array['catInfo']) > 0){			

				if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
					$array['errorItems'] = $_SESSION['formError'];
					unset($_SESSION['formError']);
				}
		
				$this->loadTemplate('categories_edit', $array);
			} else {
				header("Location: ".BASE_URL."categories");
				exit;
			}

		} else {
			header("Location: ".BASE_URL."categories");
			exit;
		}

	}


	public function edit_action($id){

		if(!empty($id)){

		} else {
			header("Location: ".BASE_URL."categories");
		}

	}

	public function del($id){
		if(!empty($id)){

			$cat = new Categorie();

			$cats = $cat->scanCategories($id);

			if($cat->hasProducts($cats) == false){
				$cat->deleteCategories($cats);
			}
			

		} else {
			header("Location: ".BASE_URL."categories");
			exit;
		}
	}	
}