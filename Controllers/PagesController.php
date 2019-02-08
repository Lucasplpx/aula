<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuario;
use \Models\Pages;

class PagesController extends Controller {

	private $user;

	public function __construct(){
		$this->user = new Usuario();

		if(!$this->user->isLogged()){
			header("Location: ".BASE_URL."login");
			exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'pages'
		);


	}

	public function index() {
        $array = array(
            'user' => $this->user,
            'list' => array()
		);		

		$p = new Pages();

		$array['list'] = $p->getAll();


		$this->loadTemplate('pages', $array);
	}

	public function add(){
		$array = array(
            'user' => $this->user,
			'list' => array(),
			'errorItems' => array()
		);		


		$this->loadTemplate('pages_add', $array);
	}

	public function add_action(){

		if(!empty($_POST['title'])){
			$p = new Pages();

			$title = $_POST['title'];
			$body = $_POST['body'];
			
			$p->add($title, $body);

			header("Location: ".BASE_URL."pages");
			exit;
		} else {
			$_SESSION['formError'] = array('title');

			header("Location: ".BASE_URL."pages/add");
			exit;
		}	

	}


	public function del($id){
		if(!empty($id)){

			$p = new Pages();
			$p->del($id);

		} 

		header("Location: ".BASE_URL."pages");
		exit;
	}

	public function edit($id){
		$array = array(
			'user' => $this->user,
			'info' => array(),
			'errorItems' => array()
		);

		if(!empty($id)){

			$p = new Pages();
			$array['info'] = $p->get($id);

			if(count($array['info']) > 0){
				$this->loadTemplate("pages_edit", $array);
			} else {
				header("Location: ".BASE_URL."pages");
				exit;
			}			

		} else {
			header("Location: ".BASE_URL."pages");
			exit;
		}

	}

	public function edit_action($id){

		if(!empty(intval($id))){

			if(!empty($_POST['title'])){
				$p = new Pages();

				$title = $_POST['title'];
				$body = $_POST['body'];

				$p->update($id, $title, $body);

				header("Location: ".BASE_URL."pages");
				exit;

			} else {	
				$_SESSION['formError'] = array('title');

				header("Location: ".BASE_URL."pages/edit/".$id);
				exit;
			}

		} else {
			header("Location: ".BASE_URL."pages");
			exit;
		}

	}

	public function upload(){
		if(!empty($_FILES['file']['tmp_name'])){

			$types_allowed = array('image/jpeg', 'image/png');

			if(in_array($_FILES['file']['type'], $types_allowed)){
				$newname = md5(time().rand(0,999).rand(0,999)).'.jpg';
				move_uploaded_file($_FILES['file']['tmp_name'], '../projeto/media/pages/'.$newname);

				$array = array(
					'location' => BASE_URL.'media/pages/'.$newname
				);

				echo json_encode($array);
				exit;
			}

		}
	}




}