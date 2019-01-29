<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuario;
use \Models\Permissao;

class PermissaoController extends Controller {

	private $user;

	public function __construct(){
		$this->user = new Usuario();

		if(!$this->user->isLogged()){
			header("Location: ".BASE_URL."login");
			exit;
		}

        if(!$this->user->temPermissao('ver_permissoes')){
            header("Location: ".BASE_URL);
            exit;
        }

	}

	public function index() { 
        $array = array(
            'user' => $this->user,
            'list' => array()
        );

        $p = new Permissao();

        $array['list'] = $p->getAllGroups();
    
        $this->loadTemplate('permissao', $array);
    }

    public function itens(){
        $array = array(
            'user' => $this->user,
            'list' => array(),
            'error_del' => array(),
            'sucesso' => array(),
            'delSucesso' => array()
        );

        $p = new Permissao();

        $array['list'] = $p->getAllItens();

        if(isset($_SESSION['delError']) && count($_SESSION['delError']) > 0){
            $array['error_del'] = $_SESSION['delError'];
            unset($_SESSION['delError']);
        }

        if(isset($_SESSION['update']) && count($_SESSION['update']) > 0){
            $array['sucesso'] = $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['delSuccess']) && count($_SESSION['delSuccess']) > 0){
            $array['delSucesso'] = $_SESSION['delSuccess'];
            unset($_SESSION['delSuccess']);
        }

        
       
    
        $this->loadTemplate('permissao_itens', $array);
    }

    public function itens_add(){
        $array = array(
            'user' => $this->user,
            'errorItems' => array()
        );

        $p = new Permissao();

        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

        $this->loadTemplate('permissao_itens_add', $array);
    }

    public function add_itens_action() {
        $p = new Permissao();

        if(!empty($_POST['nome']) && !empty($_POST['slug'])){
            $nome = $_POST['nome'];
            $slug = $_POST['slug'];

            $p->addItem($nome, $slug);

            header("Location: ".BASE_URL."permissao/itens");
            exit;

        } else {
            $_SESSION['formError'] = array('name');

            header("Location: ".BASE_URL.'permissao/itens_add');
            exit;
        }
        
    }

    public function edit_itens_action($id) {
        $p = new Permissao();
        if(!empty($id)){
     
            if(!empty($_POST['nome']) && !empty($_POST['slug'])){
                $nome = $_POST['nome'];
                $slug = $_POST['slug'];

                $p->updateItem($id, $nome, $slug);

                $_SESSION['update'] = array('success');

                header("Location: ".BASE_URL."permissao/itens");
                exit;

            } else {
                $_SESSION['formError'] = array('name');

                header("Location: ".BASE_URL.'permissao/itens_edit');
                exit;
            }
        }

    }

    public function itens_edit($id){
        if(!empty($id)){

            $array = array(
                'user' => $this->user,
                'errorItems' => array()
            );

            $p = new Permissao();

            $nome = '';
            $slug = '';
            $array['permissao_item'] = $p->getPermissaoItemNome($id);
            foreach($array['permissao_item'] as $item){
                
                $nome = $item['nome'];
                $slug = $item['slug'];
            }
            $array['id_item'] = $id;
            $array['nome'] = $nome;
            $array['slug'] = $slug;

    

            if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
                $array['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
            }

            $this->loadTemplate('permissao_itens_edit', $array);
        } else {
            header("Location: ".BASE_URL.'permissao/itens');
            exit;
        }
    }

    public function itens_del($id_item){
        $p = new Permissao();

        if($p->canDeleteItem($id_item) == false){
            $_SESSION['delError'] = array('delete');
    
            header("Location: ".BASE_URL.'permissao/itens');
            exit;
        }

        $p->deleteItem($id_item);

        $_SESSION['delSuccess'] = array('delete');

        header("Location: ".BASE_URL.'permissao/itens');
        exit;
    }
    
    public function del($id_group){
        $p = new Permissao();

        $p->deleteGroup($id_group);

        header("Location: ".BASE_URL.'permissao');
        exit;
    }

    public function add(){
        $array = array(
            'user' => $this->user,
            'errorItems' => array()
        );

        $p = new Permissao();

        $array['permissao_itens'] = $p->getAllItens();

        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

        $this->loadTemplate('permissao_add', $array);
    }

    public function add_action() {
        $p = new Permissao();

        if(!empty($_POST['nome'])){
            $nome = $_POST['nome'];
            $id = $p->addGrupo($nome);

            if(isset($_POST['itens']) && count($_POST['itens']) > 0){
                $itens = $_POST['itens'];

                foreach ($itens as $item) {
                    $p->linkItemToGroup($id, $item);
                }

            }

            header("Location: ".BASE_URL."permissao");
            exit;

        } else {
            $_SESSION['formError'] = array('name');

            header("Location: ".BASE_URL.'permissao/add');
            exit;
        }

    }

    public function edit($id){
        if(!empty($id)){

            $array = array(
                'user' => $this->user,
                'errorItems' => array()
            );

            $p = new Permissao();

            $array['permissao_itens'] = $p->getAllItens();
            $array['permissao_id'] = $id;
            $array['permissao_grupo_nome'] = $p->getPermissaoGrupoNome($id);
            $array['permissao_grupo_slugs'] = $p->getPermissao($id);

            if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
                $array['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
            }

            $this->loadTemplate('permissao_edit', $array);
        } else {
            header("Location: ".BASE_URL.'permissao');
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)){
            $p = new Permissao();

            if(!empty($_POST['nome'])){
                $nome = $_POST['nome'];

                $p->editNome($nome, $id);

                $p->clearLinks($id);
    
                if(isset($_POST['itens']) && count($_POST['itens']) > 0){
                    $itens = $_POST['itens'];
    
                    foreach ($itens as $item) {
                        $p->linkItemToGroup($id, $item);
                    }
    
                }
    
                header("Location: ".BASE_URL."permissao");
                exit;
    
            } else {
                $_SESSION['formError'] = array('name');
    
                header("Location: ".BASE_URL.'permissao/edit/'.$id);
                exit;
            }


        } else {
            header("Location: ".BASE_URL.'permissao');
            exit;
        }
    }


}









