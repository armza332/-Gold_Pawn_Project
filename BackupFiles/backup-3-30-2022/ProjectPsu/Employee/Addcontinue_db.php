<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['continue'])) {
       $id = $_POST['id'];
       $idcard = $_POST['idcard'];
       $pf_type = $_POST['pf_type'];
       $pf_price = $_POST['pf_price'];
       $old_interestpaid = $_POST['old_interestpaid'];
       $con_interestpaid = $_POST['con_interestpaid'];
       $pf_expdate = $_POST['newpf_expdate'];
       $old_expdate = $_POST['pf_expdate'];
       $comment = $_POST['comment'];
    $pf_interestpaid = $old_interestpaid+$con_interestpaid;
    $current_interest = $old_interestpaid+$con_interestpaid;
       if (empty($con_interestpaid)) {
        $_SESSION['error'] = 'กรุณากรอกจำนวนดอกเบี้ย';
        header("location: Addcontinue.php?continueID=$id");
    } 
    
    

    else {
        try {

           if (!isset($_SESSION['error'])) {
        $stmt = $conn->prepare("INSERT INTO continueint(id, idcard, pf_price, pf_type, con_interestpaid, new_expdate, comment, old_expdate) VALUES (:id, :idcard, :pf_price, :pf_type, :con_interestpaid, :new_expdate, :comment ,:old_expdate)");
        $stmt -> bindParam(":id",$id);
        $stmt -> bindParam(":idcard",$idcard);
        $stmt -> bindParam(":pf_price",$pf_price);
        $stmt -> bindParam(":pf_type",$pf_type);
        $stmt -> bindParam(":con_interestpaid",$con_interestpaid);
        $stmt -> bindParam(":new_expdate",$pf_expdate);
        $stmt -> bindParam(":old_expdate",$old_expdate);
        $stmt -> bindParam(":comment",$comment);
        $stmt -> execute();
        $pf = $conn->query("UPDATE pawnform SET pf_interestpaid = $pf_interestpaid WHERE id = $id");
        $pf2 = $conn->prepare("UPDATE pawnform SET pf_expdate = :pf_expdate  WHERE id = $id");
        $pf2 -> bindParam(":pf_expdate",$pf_expdate);
        $pf->execute();
        $pf2->execute();
        $interest = $conn->query("UPDATE pawnform SET current_interestpaid = $current_interest WHERE id = $id");
        $interest -> execute();
        $_SESSION['success'] = "ทำการต่อดอกเบี้ยเรียบร้อยแล้ว";
                   header("location: Addcontinue.php?continueID=$id ");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: Addcontinue.php?continueID=$id ");
                   }
    
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
