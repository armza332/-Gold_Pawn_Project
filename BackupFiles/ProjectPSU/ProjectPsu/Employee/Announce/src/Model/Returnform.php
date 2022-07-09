<?php
namespace App\Model;

use App\Database\Db;

class Returnform extends Db{

   

    public function getAllReturnform($filters=[]){
        
        // order by = เรียงโดย... ตามด้วยชื่อหัวตารางในdatabase
        $sql = "
        SELECT 
            * 
        FROM 
            returnpawn 
        WHERE
            returnpawn.rt_id > 0
            
        
        
        ";
        $stmt = $this->pdo->prepare($sql);
		$stmt->execute($filters);
		$data = $stmt->fetchAll();
        return $data;
    }
}
?>