<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['confirm'])) {
        $pf_type = $_POST['pf_type'];
        $pf_weight = $_POST['pf_weight'];
        $pf_price = $_POST['pf_price'];
        $idcard = $_POST['idcard'];
        $pf_expdate = $_POST['pf_expdate'];
        $pf_des = $_POST['pf_des'];
        $pf_status = 'จำนำ';
        $pf_interestpaid = '0';
        $current_interestpaid = '0';

        if (empty($pf_type)) {
            $_SESSION['error'] = 'กรุณาเลือกประเภท';
            header("location: pawnform.php");
        } else if (empty($pf_weight)) {
            $_SESSION['error'] = 'กรุณากรอกน้ำหนัก';
            header("location: pawnform.php");
        } else if (empty($pf_price)) {
            $_SESSION['error'] = 'กรุณากรอกราคาประเมิน';
            header("location: pawnform.php");
        } else if (empty($idcard)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสบัตรประชาชนลูกค้า';
            header("location: pawnform.php");
        } else if (empty($pf_expdate)) {
            $_SESSION['error'] = 'กรุณาเลือกวันหมดอายุสัญญา';
            header("location: pawnform.php");
        }
        
        

        else {
            try {

               if (!isset($_SESSION['error'])) {
                   $stmt = $conn->prepare("INSERT INTO pawnform(pf_type, pf_weight, pf_price, idcard, pf_expdate, pf_des, pf_status, pf_interestpaid, current_interestpaid) VALUES (:pf_type, :pf_weight, :pf_price, :idcard, :pf_expdate, :pf_des, :pf_status, :pf_interestpaid ,:current_interestpaid)");
                   $stmt -> bindParam(":pf_type",$pf_type);
                   $stmt -> bindParam(":pf_weight",$pf_weight);
                   $stmt -> bindParam(":pf_price",$pf_price);
                   $stmt -> bindParam(":idcard",$idcard);
                   $stmt -> bindParam(":pf_expdate",$pf_expdate);
                   $stmt -> bindParam(":pf_des",$pf_des);
                   $stmt -> bindParam(":pf_status",$pf_status);
                   $stmt -> bindParam(":pf_interestpaid",$pf_interestpaid);
                   $stmt -> bindParam(":current_interestpaid",$current_interestpaid);
                   $stmt -> execute();
                   $_SESSION['success'] = "ทำการบันทึกรายการขายฝากเรียบร้อย";
                   header("location: PawnForm.php");
               } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: PawnForm.php");
               }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>