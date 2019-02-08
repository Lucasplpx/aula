<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuario;
use \Models\Product;
use \Models\Categorie;
use \Models\Brand;

class ProductsController extends Controller {

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
		
		$p = new Product();

		$array['list'] = $p->getAll();


		if(isset($_SESSION['errorEdit']) && count($_SESSION['errorEdit']) > 0){
            $array['errorNome'] = $_SESSION['errorEdit'];
            unset($_SESSION['errorEdit']);
        }

		$this->loadTemplate('products', $array);
	}


	public function add(){
		$b = new Brand();
		$cat = new Categorie();

		$array = array(
            'user' => $this->user,
            'errorItems' => array()
		);
		
		
		$array['catList'] = $cat->getAll();
		$array['list'] = $b->getAll();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

		$this->loadTemplate('products_add', $array);
	}
    
	public function add_action(){
		$cat = new Categorie();

        if(!empty($_POST['id_category']) && !empty($_POST['id_brand']) && !empty($_POST['name'])){
			$idCategorie = $_POST['id_category'];
			$idMarca = $_POST['id_brand'];
			$nomeProduto = $_POST['name'];
			$estoque = $_POST['stock'];
			$price_from = $_POST['price_from'];
			$price = $_POST['price'];
			$peso = $_POST['weight'];
			$largura = $_POST['width'];
			$altura = $_POST['height'];
			$comprimento = $_POST['lenght'];
			$diametro = $_POST['diameter'];
			$descricao = $_POST['body'];
			$destaque = $_POST=['featured'];
			$promocao = $_POST=['sale'];
			$vendidos = $_POST['bestseller'];
			$novoProduto = $_POST['new_product'];

            $cat->add($idCategorie, $idMarca, $nomeProduto, $estoque, $price_from, $price, $peso, $largura, $altura, $comprimento, $diametro, $descricao, $destaque, $promocao, $vendidos, $novoProduto);
			            
            header("Location: ".BASE_URL."brands");
            exit;

        } else {
            $_SESSION['formError'] = array('name');

            header("Location: ".BASE_URL.'brands/add');
            exit;
        }

	}

	/*
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
    */

}
