<?php
namespace Models;

use \Core\Model;
use \Models\Categories;
use \Models\Brand;

class Product extends Model {


    public function getAll(){
        $cat = new Categorie();
        $brands = new Brand();
        $data = array();

        $sql = "SELECT id_category, id_brand, name, stock, price, price_from FROM products";   
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){        
            $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
           
            foreach($data as $key => $item){
                $catInfo = $cat->getCategoria($item['id_category']);
                $brandInfo = $brands->getMarca($item['id_brand']);

                $data[$key]['name_category'] = $catInfo['name'];
                $data[$key]['name_brand'] = $brandInfo['name'];
            }

        }
        return $data;
    }

    /*
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
    */
}
