<?php
namespace Models;

use \Core\Model;

class Permissao extends Model {

    public function getPermissaoGrupoNome($id_permissao){

        $sql = "SELECT nome FROM permissao_grupos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_permissao);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            return $data['nome'];
        } else {
            return '';
        }

    }

    public function getPermissao($id_permissao){
        $array = array();

        $sql = "SELECT id_permissao_item FROM permissao_links WHERE id_permissao_grupo = :id_permissao";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_permissao", $id_permissao);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            $ids = array();
            foreach($data as $data_item){
                $ids[] = $data_item['id_permissao_item'];
            }
            
            $sql = "SELECT slug FROM permissao_itens WHERE id IN (".implode(',', $ids).")";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0) {
                $data = $sql->fetchAll();
                
                foreach($data as $data_item){
                    $array[] = $data_item['slug'];
                }

            }

        }

        return $array;
    }

	public function getAllGroups() {
		$array = array();

        $sql = "SELECT permissao_grupos.*, 
        (select count(*) from usuario where usuario.id_permissao = permissao_grupos.id) as total_users FROM permissao_grupos";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

		return $array;
    }

    public function getAllItens(){
        $array = array();

        $sql = "SELECT * FROM permissao_itens";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $array;
    }

    public function canDeleteItem($id_item){

        $sql = "SELECT  count(pl.id_permissao_item) as total_itens FROM permissao_itens pi
        INNER JOIN permissao_links pl ON pi.id = pl.id_permissao_item
        WHERE pi.id = :id_item";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_item", $id_item);
        $sql->execute();

        $data = $sql->fetch();
        $total_itens = $data['total_itens'];

        if($total_itens === 0){
            return true;
        } else {
            return false;
        }


    }



    public function editNome($nome, $id){
        $sql = "UPDATE permissao_grupos SET nome = :nome WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function clearLinks($id){
        $sql = "DELETE FROM permissao_links WHERE id_permissao_grupo = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    
    public function deleteGroup($id_group){

        $sql = "SELECT id FROM usuario WHERE id_permissao = :id_group";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_group", $id_group);
        $sql->execute();

        if($sql->rowCount() === 0 ){

            $sql = "DELETE FROM permissao_links WHERE id_permissao_grupo = :id_group";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_group", $id_group);
            $sql->execute();

            $sql = "DELETE FROM permissao_grupos WHERE id = :id_group";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_group", $id_group);
            $sql->execute();

        }

    }

    public function deleteItem($id_item){

        $sql = "SELECT * FROM permissao_links WHERE id_permissao_item = :id_permissao_item";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_permissao_item", $id_item);
        $sql->execute();

        if($sql->rowCount() === 0){
            $sql = "DELETE FROM permissao_itens WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id_item);
            $sql->execute();
        }

    }

    public function addGrupo($nome){

        $sql = "INSERT INTO permissao_grupos (nome) VALUES (:nome)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->execute();

        return $this->db->lastInsertId();

    }

    public function linkItemToGroup($id_grupo, $id_item){

        $sql = "INSERT INTO permissao_links (id_permissao_grupo, id_permissao_item) VALUES (:id_grupo, :id_item)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_grupo", $id_grupo);
        $sql->bindValue(":id_item", $id_item);
        $sql->execute();
        
    }

}









