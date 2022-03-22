<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['unactive'])) {
       $id = $_POST['id'];
       $idcard = $_POST['idcard'];
       $pf_type = $_POST['pf_type'];
       $pf_price = $_POST['pf_price'];
       $pf_netprice = $_POST['pf_netprice'];

       if (empty($pf_type)) {
        $_SESSION['error'] = 'กรุณาเลือกประเภท';
        header("location: retunform.php");
    } 
    
    

    else {
        try {

           if (!isset($_SESSION['error'])) {
       
        
        $stmt = $conn->prepare("INSERT INTO returnpawn(id, idcard, pf_price, pf_type, pf_netprice) VALUES (:id, :idcard, :pf_price, :pf_type, :pf_netprice)");
        $stmt -> bindParam(":id",$id);
        $stmt -> bindParam(":idcard",$idcard);
        $stmt -> bindParam(":pf_price",$pf_price);
        $stmt -> bindParam(":pf_type",$pf_type);
        $stmt -> bindParam(":pf_netprice",$pf_netprice);
        $stmt -> execute();
        $pf = $conn->query("UPDATE pawnform SET pf_status = 'ไถ่ถอนแล้ว' WHERE id = $id");
        $pf2 = $conn->query("UPDATE pawnform SET pf_netprice = $pf_netprice WHERE id = $id");
        $pf->execute();
        $pf2->execute();
        $_SESSION['success'] = "ทำการไถ่ถอนรายการฝากขายเรียบร้อยแล้ว";
                   header("location: retunform.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: retunform.php");
                   }
    
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }


?>