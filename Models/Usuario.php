<?php
namespace Models;

use \Core\Model;
use \Models\Permissao;

class Usuario extends Model {

    private $uid;
    private $permissao;
    private $userName;
    private $isAdmin;

	public function isLogged(){

        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $sql = "SELECT id, id_permissao, nome, admin FROM usuario WHERE token = :token";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':token', $token);
            $sql->execute();

            if($sql->rowCount() > 0){

                $p = new Permissao();

                $data = $sql->fetch();
                $this->uid = $data['id'];
                $this->userName = $data['nome'];
                $this->isAdmin = $data['admin'];
                $id_permissao = $data['id_permissao'];

                $this->permissao = $p->getPermissao($id_permissao);

                return true;
            }
        }   
        
        return false;
    }

    public function getNome(){
        return $this->userName;
    }

    public function isAdmin() {
        if($this->isAdmin == '1'){
            return true;
        } else {
            return false;
        }
    }

    public function temPermissao($permissao_slug){

        if(in_array($permissao_slug, $this->permissao)){
            return true;
        } else {
            return false;
        }

    }


    public function validateLogin($email, $senha){

        $sql = "SELECT id FROM usuario WHERE email = :email AND senha = :senha AND admin = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
           
            $data = $sql->fetch();
            $token = md5(time().rand(0, 999).$data['id'].time());

            $sql = "UPDATE usuario SET token = :token WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":token", $token);
            $sql->bindValue(":id", $data['id']);
            $sql->execute();

            $_SESSION['token'] = $token;

            return true;
        }

        return false;

    }


    public function getId(){
        return $this->uid;
    }

}