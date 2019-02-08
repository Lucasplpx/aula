<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuario;
use \Models\Options;

class OptionsController extends Controller {

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
			'menuActive' => 'options'
		);


	}

	public function index() {
        $array = array(
            'user' => $this->user,
			'list' => array(),
			'errorNome' => array()
		);
		
		$o = new Options();

		$array['list'] = $o->getAll(true);


		if(isset($_SESSION['errorEdit']) && count($_SESSION['errorEdit']) > 0){
            $array['errorNome'] = $_SESSION['errorEdit'];
            unset($_SESSION['errorEdit']);
        }

		$this->loadTemplate('options', $array);
	}

	public function add(){
		$array = array(
            'user' => $this->user,
            'errorName' => array()
		);
		
		$o = new Options();

		$array['list'] = $o->getAll();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorName'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

		$this->loadTemplate('options_add', $array);
	}

	public function add_action(){
		$o = new Options();

        if(!empty($_POST['nome'])){
            $nome = $_POST['nome'];
            $o->add($nome);
			            
            header("Location: ".BASE_URL."options");
            exit;

        } else {
            $_SESSION['formError'] = array('name');

            header("Location: ".BASE_URL.'options/add');
            exit;
        }

	}

	public function edit($id){
		$array = array(
            'user' => $this->user,
			'lista' => '',
			'errorNome' => array()
		);
		
		$o = new Options();
		if(!empty(intval($id))){
			$array['lista'] = $o->get($id);

			if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
				$array['errorNome'] = $_SESSION['formError'];
				unset($_SESSION['formError']);
			}

		} else {
			$_SESSION['errorEdit'] = array('nome');
            header("Location: ".BASE_URL.'options');
            exit;

		}
		
		$this->loadTemplate('options_edit', $array);
	}

	public function add_edit_action($id){

		if(!empty($id)){
            $o = new Options();

            if(!empty($_POST['nome'])){
                $nome = $_POST['nome'];

                $o->edit($id, $nome);
				                   
                header("Location: ".BASE_URL."options");
                exit;
    
            } else {
                $_SESSION['formError'] = array('name');
    
                header("Location: ".BASE_URL.'options/edit/'.$id);
                exit;
            }


        } else {
            header("Location: ".BASE_URL.'options');
            exit;
        }
	}

	public function del($id){
        $o = new Options();

        $o->delete($id);

        header("Location: ".BASE_URL.'options');
        exit;
    }

}
