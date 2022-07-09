<?php
namespace App\Model;

use App\Database\Db;

class Announce extends Db{

    public function getAllAnnounce($filters=[]){
        
        $where = '';

        if($filters['search']) {
			$where .= " AND ( 
				announce.header LIKE :search 
				OR announce.doc LIKE :search
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
            announce 
        WHERE
            announce.id > 0
            {$where}
        
        
        ";
        $stmt = $this->pdo->prepare($sql);
		$stmt->execute($filters);
		$data = $stmt->fetchAll();
        return $data;
    }

    public function addAnnounce($announce){
        $sql = "
        INSERT INTO announce(
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
        $stmt->execute($announce);
        return $this->pdo->lastInsertId();
    }

    public function updateAnnounce($announce) {
            $sql = "
                UPDATE announce SET
                   
                    header = :header, 
                    content = :content, 
                    doc = :doc,
                    picture = :picture
                    
                    
                WHERE id = :id
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($announce);
            return true;
    }


    public function deleteAnnounce($id){
        $sql = "
        DELETE FROM announce WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

    public function getAllAnnounceById($id){
        $sql = "
        SELECT
                announce.id,
                announce.header,
                announce.content,
                announce.doc,
                announce.picture
        FROM 
                announce 
        WHERE 
            announce.id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll(); //ดึงข้อมูลออกมาจาก obj stmt มาเก็บใน obj data
        return $data[0];
    }
}
?>