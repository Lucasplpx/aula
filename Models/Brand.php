<?php
namespace Models;

use \Core\Model;

class Brand extends Model {

    public function getAll(){
        $data = array();

        $sql = "SELECT * FROM brands";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
        
            $data = $sql->fetchAll(\PDO::FETCH_ASSOC);

        }
        return $data;
    }

    public function addMarca($nome){

        if(!empty($nome)){

            $sql = "INSERT INTO brands (name) VALUES (:name)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":name", $nome);
            $sql->execute();

        }

    }

    public function getMarca($id){

        $data = array();
        if(!empty(intval($id))){

            $sql = "SELECT * FROM brands WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetch(\PDO::FETCH_ASSOC);

                return $data;
            }
        }
    }

    public function editMarca($id, $nome){

        if(!empty($id)){

            $sql = "UPDATE brands SET name = :nome WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":id", $id);
            $sql->execute();

        }

    }

    public function deleteMarca($id_marca){
        if(!empty(intval($id_marca))){

            $sql = "DELETE FROM brands WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id_marca);
            $sql->execute();

        }
    }

}
