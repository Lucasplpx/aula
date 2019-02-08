<?php
namespace Models;

use \Core\Model;

class Options extends Model {

    public function getAll($check_has_products = false){
        $data = array();

        if($has_products){
            $sql = "SELECT *, (select count(*) from products_options WHERE products_options.id = options.id ) as product_count FROM options";
        } else {
            $sql = "SELECT * FROM options";
        }       

        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
        
            $data = $sql->fetchAll(\PDO::FETCH_ASSOC);

        }
        return $data;
    }

    public function add($nome){

        if(!empty($nome)){

            $sql = "INSERT INTO options (name) VALUES (:name)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":name", $nome);
            $sql->execute();

        }

    }

    public function get($id){

        $data = array();
        if(!empty(intval($id))){

            $sql = "SELECT * FROM options WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetch(\PDO::FETCH_ASSOC);

                return $data;
            }
        }
    }

    public function edit($id, $nome){

        if(!empty($id)){

            $sql = "UPDATE options SET name = :nome WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":id", $id);
            $sql->execute();

        }

    }

    public function delete($id){
        if(!empty(intval($id))){
        
            $sql = "DELETE FROM options WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

        }
    }

}
