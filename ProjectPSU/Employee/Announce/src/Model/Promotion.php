<?php
namespace App\Model;

use App\Database\Db;

class Promotion extends Db{

    public function getAllPromotion($filters=[]){
        
        $where = '';

        if($filters['search']) {
			$where .= " AND ( 
				promotion.header LIKE :search 
				OR promotion.doc LIKE :search
			) ";
			$filters['search'] = "%{$filters['search']}%";
		}else{
			unset($filters['search']);
		}



        // order by = เรียงโดย... ตามด้วยชื่อหัวตารางในdatabase
        $sql = "
        SELECT 
            * 
        FROM 
            promotion 
        WHERE
            promotion.id > 0
            {$where}
        
        
        ";
        $stmt = $this->pdo->prepare($sql);
		$stmt->execute($filters);
		$data = $stmt->fetchAll();
        return $data;
    }

    public function addPromotion($promotion){
        $sql = "
        INSERT INTO promotion(
            header,
            content,
            doc,
            picture 
        ) VALUES (
            :header,
            :content,
            :doc,
            :picture    
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($promotion);
        return $this->pdo->lastInsertId();
    }

    public function updatePromotion($promotion) {
            $sql = "
                UPDATE promotion SET
                   
                    header = :header, 
                    content = :content, 
                    doc = :doc,
                    picture = :picture
                    
                    
                WHERE id = :id
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($promotion);
            return true;
    }


    public function deletePromotion($id){
        $sql = "
        DELETE FROM promotion WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

    public function getAllPromotionById($id){
        $sql = "
        SELECT
                promotion.id,
                promotion.header,
                promotion.content,
                promotion.doc,
                promotion.picture
        FROM 
                promotion 
        WHERE 
            promotion.id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll(); //ดึงข้อมูลออกมาจาก obj stmt มาเก็บใน obj data
        return $data[0];
    }
}
?>