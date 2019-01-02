<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuario;

class LoginController extends Controller {

	public function index() {
		$array = array(
            'error' => ''
        );

        if(!empty($_SESSION['errorMsg'])){
            $array['error'] = $_SESSION['errorMsg'];
            unset($_SESSION['errorMsg']);
        }

		$this->loadView('login', $array);
    }
    
    public function index_action(){
        
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $senha = $_POST['password'];

            $u = new Usuario();
            if($u->validateLogin($email, $senha)){
                header("Location: ".BASE_URL);
                exit;
            } else {
                $_SESSION['errorMsg'] = 'Usuário e/ou senha errados!';
            }
        } else {
            $_SESSION['errorMsg'] = 'Preencha os campos abaixo.';
        }

        header("Location: ".BASE_URL."login");
        exit;
    }

    public function logout(){

        unset($_SESSION['token']);
        header('Location: '.BASE_URL);
        exit;
    }







}