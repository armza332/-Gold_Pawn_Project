<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['savean'])) {
        $an_title = $_POST['an_title'];
        $editor1 = $_POST['editor1'];
        $an_status = $_POST['an_status'];
        $an_date = $_POST['an_date'];
        $an_note = $_POST['an_note'];
        

        if (empty($an_title)) {
            $_SESSION['error'] = 'กรุณาเลือกประเภท';
            header("location: pawnform.php");
        }         
        

        else {
            try {

               if (!isset($_SESSION['error'])) {
                   $stmt = $conn->prepare("INSERT INTO announce (an_title, editor1, an_status, an_date, an_note) VALUES (:an_title, :editor1, :an_status, :an_date, :an_note)");
                   $stmt -> bindParam(":an_title",$an_title);
                   $stmt -> bindParam(":editor1",$editor1);
                   $stmt -> bindParam(":an_status",$an_status);
                   $stmt -> bindParam(":an_date",$an_date);
                   $stmt -> bindParam(":an_note",$an_note);
                  
                   $stmt -> execute();
                   $_SESSION['success'] = "ทำการบันทึกข่าวประชาสัมพันธ์";
                   header("location: AddAnnounce.php");
               } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: AddAnnounce.php");
               }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>