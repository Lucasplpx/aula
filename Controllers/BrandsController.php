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
			'list' => array(),
			'errorNome' => array()
		);
		
		$b = new Brand();

		$array['list'] = $b->getAll();

		if(isset($_SESSION['errorEdit']) && count($_SESSION['errorEdit']) > 0){
            $array['errorNome'] = $_SESSION['errorEdit'];
            unset($_SESSION['errorEdit']);
        }

		$this->loadTemplate('brands', $array);
	}

	public function add(){
		$array = array(
            'user' => $this->user,
            'errorName' => array()
		);
		
		$b = new Brand();

		$array['list'] = $b->getAll();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorName'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

		$this->loadTemplate('brands_add', $array);
	}

	public function add_action(){
		$b = new Brand();

        if(!empty($_POST['nome'])){
            $nome = $_POST['nome'];
            $b->addMarca($nome);
			            
            header("Location: ".BASE_URL."brands");
            exit;

        } else {
            $_SESSION['formError'] = array('name');

            header("Location: ".BASE_URL.'brands/add');
            exit;
        }

	}

	public function edit($id){
		$array = array(
            'user' => $this->user,
			'lista' => '',
			'errorNome' => array()
		);
		
		$b = new Brand();
		if(!empty(intval($id))){
			$array['lista'] = $b->getMarca($id);

			if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
				$array['errorNome'] = $_SESSION['formError'];
				unset($_SESSION['formError']);
			}

		} else {
			$_SESSION['errorEdit'] = array('nome');
            header("Location: ".BASE_URL.'brands');
            exit;

		}
		
		$this->loadTemplate('brands_edit', $array);
	}

	public function add_edit_action($id){

		if(!empty($id)){
            $b = new Brand();

            if(!empty($_POST['nome'])){
                $nome = $_POST['nome'];

                $b->editMarca($id, $nome);
				                   
                header("Location: ".BASE_URL."brands");
                exit;
    
            } else {
                $_SESSION['formError'] = array('name');
    
                header("Location: ".BASE_URL.'brands/edit/'.$id);
                exit;
            }


        } else {
            header("Location: ".BASE_URL.'brands');
            exit;
        }
	}

	public function del($id_marca){
        $b = new Brand();

        $b->deleteMarca($id_marca);

        header("Location: ".BASE_URL.'brands');
        exit;
    }

}
