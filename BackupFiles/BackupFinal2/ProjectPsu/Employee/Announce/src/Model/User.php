<?php
namespace App\Model;

use App\Database\Db;

class User extends Db{

    public function getAllUser($filters=[]){
        
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
            usersgp 
        WHERE
            usersgp.id > 0
            {$where}
        
        
        ";
        $stmt = $this->pdo->prepare($sql);
		$stmt->execute($filters);
		$data = $stmt->fetchAll();
        return $data;
    }

   

    public function updateUser($usersgp) {
            $sql = "
                UPDATE usersgp SET
                   
                firstname = :firstname, 
                lastname = :lastname, 
                email = :email,
                phonenumber = :phonenumber,
                address = :address,   
                idcard = :idcard,
                birthday = :birthday  

                WHERE id = :id
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($usersgp);
            return true;
    }


    public function deleteUser($id){
        $sql = "
        DELETE FROM usersgp WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

    public function getAllUserById($id){
        $sql = "
        SELECT
                usersgp.id,
                usersgp.firstname,
                usersgp.lastname,
                usersgp.email,
                usersgp.phonenumber,
                usersgp.address,
                usersgp.idcard,
                usersgp.birthday
        FROM 
                usersgp 
        WHERE 
            usersgp.id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll(); //ดึงข้อมูลออกมาจาก obj stmt มาเก็บใน obj data
        return $data[0];
    }

    public function addUser($usersgp){
        $sql = "
        INSERT INTO usersgp(
            firstname,
            lastname,
            email,
            phonenumber,
            address,
            idcard,
            birthday
        ) VALUES (
            :firstname,
            :lastname,
            :email,
            :phonenumber,
            :address,
            :idcard,
            :birthday

            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($usersgp);
        return $this->pdo->lastInsertId();
    }
}
?>