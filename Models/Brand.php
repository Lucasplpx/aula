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




}
