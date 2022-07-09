<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signup'])) {
        $title = $_POST['title'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $idcard = $_POST['idcard'];
        $birthday = $_POST['birthday'];
        $password = $_POST['password'];
        $gp = $_POST['gp'];
        $urole = 'user';

        if (empty($title)) {
            $_SESSION['error'] = 'กรุณาคำนำหน้า';
            header("location: CusForm.php");
        } else if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: CusForm.php");
        }
        else if (empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: CusForm.php");
        }else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: CusForm.php");
        }else if (empty($phonenumber)) {
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์';
            header("location: CusForm.php");
        }else if (empty($address)) {
            $_SESSION['error'] = 'กรุณากรอกที่อยู่';
            header("location: CusForm.php");
        }else if (empty($idcard)) {
            $_SESSION['error'] = 'กรุณากรอกเลขบัตรประชาชน';
            header("location: CusForm.php");
        }else if (empty($birthday)) {
            $_SESSION['error'] = 'กรุณากรอกวันเกิด';
            header("location: CusForm.php");
        
        }
        
        

        else {
            try {

               $check_email = $conn->prepare("SELECT email FROM usersgp WHERE email = :email");
               $check_email->bindParam(":email",$email);
               $check_email->execute();
               $row = $check_email -> fetch(PDO::FETCH_ASSOC);

               if( $row ['email'] == $email) {
                $_SESSION['warning'] = 'อีเมลนี้มีอยู่ในระบบแล้ว';
                header("location: CusForm.php");

            }  else if (!isset($_SESSION['error'])) {
                   $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                   $stmt = $conn->prepare("INSERT INTO usersgp(title, firstname, lastname, email, phonenumber, address, idcard, birthday, password, gp, urole) VALUES (:title, :firstname, :lastname, :email, :phonenumber, :address, :idcard, :birthday, :password, :gp, :urole)");
                   $stmt -> bindParam(":title",$title);
                   $stmt -> bindParam(":firstname",$firstname);
                   $stmt -> bindParam(":lastname",$lastname);
                   $stmt -> bindParam(":email",$email);
                   $stmt -> bindParam(":phonenumber",$phonenumber);
                   $stmt -> bindParam(":address",$address);
                   $stmt -> bindParam(":idcard",$idcard);
                   $stmt -> bindParam(":birthday",$birthday);
                   $stmt -> bindParam(":password",$passwordHash);
                   $stmt -> bindParam(":gp",$gp);
                   $stmt -> bindParam(":urole",$urole);
                   $stmt -> execute();
                   $_SESSION['success'] = "ทำการสมัครสมาชิกเรียบร้อยแล้ว";
                   header("location: CusForm.php");
               } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: CusForm.php");
               }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>