<?php
namespace App\Model;

use App\Database\Db;

class Pawnform extends Db{

   

    public function addPawnform($pawnform){
        $sql = "
        INSERT INTO pawnform(
            pf_type,
            pf_weight,
            pf_price,
            idcard,
            pf_expdate,
            pf_des,
            pf_status,
            pf_netprice,
            pf_interestpaid,
            current_interestpaid,
            picture
           
        ) VALUES (
            :pf_type,
            :pf_weight,
            :pf_price,
            :idcard,
            :pf_expdate,
            :pf_des,
            :pf_status,
            :pf_netprice,
            :pf_interestpaid,
            :current_interestpaid,
            :picture
               
            )
        ";
        $sql = $this->pdo->prepare($sql);
        $sql->execute($pawnform);   
        return $this->pdo->lastInsertId();
        
    }
}
?>