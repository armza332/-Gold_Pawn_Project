<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['ppay'])) {
       $id = $_POST['id'];
       $idcard = $_POST['idcard'];
       $pf_type = $_POST['pf_type'];
       $old_interestpaid = $_POST['old_interestpaid'];
       $current_interestpaid = $_POST['current_interestpaid'];
       $ppay_interestpaid = $_POST['prin_interestpaid'];
       $ppayprice = $_POST['principal_pay'];
       $pf_price = $_POST['pf_price'];
       $oldpf_creatat = $_POST['oldpf_creatat'];
       $ppay_expdate = $_POST['prin_expdate'];
       $comment = $_POST['comment'];
       $current_date = $_POST['current_date'];
    $pf_interestpaid = $old_interestpaid+$ppay_interestpaid;
    $current_interest = $current_interestpaid-$ppay_interestpaid;
$newprice = $pf_price-$ppayprice;

       if (empty($ppayprice)) {
        $_SESSION['error'] = 'กรุณากรอกจำนวนที่ต้องการชำระ';
        header("location: Addprincipal_pay.php?continueID=$id");
    }
    
    

    else {
        try {

           if (!isset($_SESSION['error'])) {
        $stmt = $conn->prepare("INSERT INTO principalpay(id, idcard, pf_type, ppay_interestpaid, ppay_expdate, comment, ppayprice, oldpf_creatat) VALUES (:id, :idcard, :pf_type, :ppay_interestpaid, :ppay_expdate, :comment , :ppayprice, :oldpf_creatat)");
        $stmt -> bindParam(":id",$id);
        $stmt -> bindParam(":idcard",$idcard);
        $stmt -> bindParam(":pf_type",$pf_type);
        $stmt -> bindParam(":ppay_interestpaid",$ppay_interestpaid);
        $stmt -> bindParam(":ppay_expdate",$ppay_expdate);
        $stmt -> bindParam(":oldpf_creatat",$oldpf_creatat);
        $stmt -> bindParam(":comment",$comment);
        $stmt -> bindParam(":ppayprice",$ppayprice);
        $stmt -> execute();
        $pf = $conn->query("UPDATE pawnform SET pf_interestpaid = $pf_interestpaid WHERE id = $id");
        $price = $conn->query("UPDATE pawnform SET pf_price = $newprice WHERE id = $id");
        $price -> execute();
        $interest = $conn->query("UPDATE pawnform SET current_interestpaid = $current_interest WHERE id = $id");
        $interest -> execute();
        $pf2 = $conn->prepare("UPDATE pawnform SET pf_expdate = :pf_expdate WHERE id = $id");
        $pf2 -> bindParam(":pf_expdate",$ppay_expdate);
        $pf->execute();
        $pf2->execute();
        $update = $conn->prepare("UPDATE pawnform SET pf_create_at = :pf_create_at WHERE id = $id");
        $update -> bindParam(":pf_create_at",$current_date);
        $update->execute();
        $_SESSION['success'] = "ทำการชำระเงินต้นเรียบร้อยแล้ว";
                   header("location: Addprincipal_pay.php?continueID=$id ");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: Addprincipal_pay.php?continueID=$id ");
                   }
    
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }


        