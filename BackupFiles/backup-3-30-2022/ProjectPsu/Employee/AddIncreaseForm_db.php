<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['principal'])) {
       $id = $_POST['id'];
       $idcard = $_POST['idcard'];
       $pf_type = $_POST['pf_type'];
       $old_interestpaid = $_POST['old_interestpaid'];
       $inc_interestpaid = $_POST['inc_interestpaid'];
       $current_interestpaid = $_POST['current_interestpaid'];
       $newprice = $_POST['newinc'];
       $pf_price = $_POST['pf_price'];
       $oldpf_creatat = $_POST['oldpf_creatat'];
       $inc_expdate = $_POST['inc_expdate'];
       $comment = $_POST['comment'];
       $current_date = $_POST['current_date'];
    $pf_interestpaid = $old_interestpaid+$inc_interestpaid;
    $current_interest = "0";
    
$newinc = $pf_price+$newprice;
       if (empty($newinc)) {
        $_SESSION['error'] = 'กรุณากรอกจำนวนดอกเบี้ย';
        header("location: AddIncreaseForm.php?continueID=$id");
    }
    
    

    else {
        try {

           if (!isset($_SESSION['error'])) {
        $stmt = $conn->prepare("INSERT INTO incprincipal(id, idcard, pf_type, inc_interestpaid, inc_expdate, comment, newinc, oldpf_creatat) VALUES (:id, :idcard, :pf_type, :inc_interestpaid, :inc_expdate, :comment , :newinc, :oldpf_creatat)");
        $stmt -> bindParam(":id",$id);
        $stmt -> bindParam(":idcard",$idcard);
        $stmt -> bindParam(":pf_type",$pf_type);
        $stmt -> bindParam(":inc_interestpaid",$inc_interestpaid);
        $stmt -> bindParam(":inc_expdate",$inc_expdate);
        $stmt -> bindParam(":oldpf_creatat",$oldpf_creatat);
        $stmt -> bindParam(":comment",$comment);
        $stmt -> bindParam(":newinc",$newprice);
        $stmt -> execute();
        $pf = $conn->query("UPDATE pawnform SET pf_interestpaid = $pf_interestpaid WHERE id = $id");
        $price = $conn->query("UPDATE pawnform SET pf_price = $newinc WHERE id = $id");
        $price -> execute();
        $interest = $conn->query("UPDATE pawnform SET current_interestpaid = $current_interest WHERE id = $id");
        $interest -> execute();
        $pf2 = $conn->prepare("UPDATE pawnform SET pf_expdate = :pf_expdate WHERE id = $id");
        $pf2 -> bindParam(":pf_expdate",$inc_expdate);
        $pf->execute();
        $pf2->execute();
        $update = $conn->prepare("UPDATE pawnform SET pf_create_at = :pf_create_at WHERE id = $id");
        $update -> bindParam(":pf_create_at",$current_date);
        $update->execute();
        $_SESSION['success'] = "ทำการเพิ่มเงินต้นเรียบร้อยแล้ว";
                   header("location: AddIncreaseForm.php?continueID=$id ");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: AddIncreaseForm.php?continueID=$id ");
                   }
    
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }


        