<?php
namespace Models;

use \Core\Model;

class Categorie extends Model {


    public function getCategories(){
        $sql = "SELECT * FROM categories";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }


}
