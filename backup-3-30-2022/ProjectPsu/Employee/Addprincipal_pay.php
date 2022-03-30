<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: login.php');
}

if (isset($_REQUEST['continueID'])) {
    try {
        $id = $_REQUEST['continueID'];
        $stmt = $conn->prepare("SELECT * FROM pawnform WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($rows);
        $nm = $conn->query("SELECT * FROM usersgp WHERE idcard = $idcard");
        $nm->execute();
        $rowss = $nm->fetch(PDO::FETCH_ASSOC);
        extract($rowss);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>ฟอร์มรายการขายฝาก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="css/main.css" rel="stylesheet" media="all">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/opensans-font.css">
    <link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- datepicker -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSSgoldpawn.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <?php

        if (isset($_SESSION['admin_login'])) {
            $admin_id = $_SESSION['admin_login'];
            $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark navcolor">
        <div class="container-xl">
            <img src="ห้างทองแสงสุวรรณ3.png" class="navbar-brand logo" style="width: 25%; margin-right: 40px" href="employeePage.php" />
            <button class="navbar-toggler buttonCl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon my-toggler"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="employeePage.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ทำรายการ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="PawnForm.php">ขายฝาก</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="Retunform.php">ไถ่ถอน</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="Increase_Principal.php">เพิ่มเงินต้น</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="principal_pay.php">ตัดต้น</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="continueform.php">ต่อดอกเบี้ย</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="CusForm.php">สมัครสมาชิกลูกค้า</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            จัดการข่าวสาร
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="AddAnnounce.php">ข่าวประชาสัมพันธ์</a></li>
                            <li>
                                <a class="dropdown-item" href="AddPromotion.php">ข่าวโปรโมชั่น</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="signinadmin.php">รายงานสรุปผล </a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <form class="container-fluid justify-content-end">
                        <a class="btn btn-outline-light me-2 blg" type="button" href="login.php">
                            <i class="fas fa-user-alt"></i> <?php echo $row['firstname'] . ' ' . $row['lastname'] ?>
                        </a>
                    </form>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-lg" style="max-width: 1100px; margin-top: 100px; margin-bottom: 0px ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="employeePage.php" style="margin-left:15px; color: black;text-decoration: none;">หน้าแรก</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="principal_pay.php" style="margin-left:15px; color: black;text-decoration: none;">รายการชำระเงินต้น</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">ทำรายการชำระเงินต้น</li>
            </ol>
        </nav>
    </div>
    <div class="page-wrapper  p-t-50 p-b-50 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <div class="container">
                        <h3 class=" title">รายการชำระเงินต้น</h3>
                        <form action="Addprincipal_pay_db.php" method="post" id="pawnform">
                            <?php if (isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['warning'])) { ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php
                                    echo $_SESSION['warning'];
                                    unset($_SESSION['warning']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php
                            $num1 = $rows['pf_price'];
                            $date1 = $rows['pf_create_at'];
                            $date2 = $rows['currenttime'];
                            $date = date('Y-m-d');
                            $ts1 = strtotime($date1);
                            $ts2 = strtotime($date2);

                            $year1 = date('Y', $ts1);
                            $year2 = date('Y', $ts2);

                            $month1 = date('m', $ts1);
                            $month2 = date('m', $ts2);

                            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);



                            $resultnet = ($num1 * $diff) * 3 / 100;
                            $results = $num1 + $resultnet;
                            $old_interestpaid = $pf_interestpaid;
                            $interestpaid = $resultnet-$current_interestpaid ;
                            ?>
                            <div class="row">

                                <div class="col-6" style="border-right: 1.5px solid;border-color:rgb(201, 0, 0)">
                                    <label for="" class="mb-3">ประเภท : <?php echo $pf_type ?></label><br>
                                    <label for="" class="mb-3">น้ำหนัก : <?php echo $pf_weight ?> กรัม</label><br>
                                    <label for="" class="mb-3">ราคาประเมิน : <?php echo $pf_price ?> บาท</label><br>
                                    <label for="" class="mb-3">รหัสบัตรประชาชนชองลูกค้า : <?php echo $idcard ?></label><br>
                                    <label for="" class="mb-3">ชื่อ-นามสกุลลูกค้า : <?php echo $title ?><?php echo $firstname ?> <?php echo $lastname ?></label><br>
                                    <label for="annotation" class="mb-3">วันหมดอายุสัญญาปัจจุบัน : <?php echo $pf_expdate ?></label><br>
                                    <label for="" class="mb-3">ดอกเบี้ยค้างชำระ : <?php echo $interestpaid ?></label>
                                </div>
                                <div class="col-5 ms-4">
                                    
                                        <label for="" class="form-row-inner mb-2">จำนวนดอกเบี้ยที่ชำระ :</label>
                                        <input type="text" class="form-control mb-2" name="prin_interestpaid" value="<?php echo $interestpaid ?>"><br>
                                        <label for="" class="form-row-inner mb-2">จำนวนเงินต้นที่ต้องการชำระ :</label>
                                        <input type="text" class="form-control mb-2" name="principal_pay" >
                                        <br>
                                        
                                        <label for="">กำหนดวันสิ้นสุดสัญญาใหม่ :</label>
                                        <input type="date" name="prin_expdate" value="<?php echo $pf_expdate ?>"><br>
                                        <label for="" class="form-row-inner mb-2">หมายเหตุ :</label>
                                        <input type="text" class="form-control mb-2" name="comment" >
                                    
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-5">
                                <input type="hidden" class="input--style-2 " name="id" value="<?php echo $rows['id']; ?>">
                                    <input type="hidden" class="input--style-2 " name="idcard" value="<?php echo $rows['idcard']; ?>">
                                    <input type="hidden" class="input--style-2 " name="pf_type" value="<?php echo $rows['pf_type']; ?>">
                                    <input type="hidden" class="input--style-2 " name="pf_price" value="<?php echo $rows['pf_price']; ?>">
                                    <input type="hidden" class="input--style-2 " name="oldpf_creatat" value="<?php echo $pf_create_at; ?>">
                                    <input type="hidden" class="input--style-2 " name="old_interestpaid" value="<?php echo $rows['pf_interestpaid']; ?>">
                                    <input type="hidden" class="input--style-2 " name="current_interestpaid" value="<?php echo $rows['current_interestpaid']; ?>">
                                    <input type="hidden" class="input--style-2 " name="current_date" value="<?php echo $date; ?>">
                                </div>

                            </div>
                            <br>



                            <div class="row">
                                
                                <div class="col d-flex flex-row-reverse">
                            
                                    <button type="button" class="btn btn-warning ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    บันทึก
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">รายการชำระเงินต้น</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ต้องการบันทึรายการชำระเงินต้นใช่หรือไม่
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-primary" name="ppay">บันทึก</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                
                                    <a href="principal_pay.php" name="ppay" class="btn btn-danger" onClick='return cancelSubmit()'>ยกเลิก</a>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="w3-container w3-padding-32 w3-center footerCL mt-4">
        <li>Copyright © 2021 ห้างทองแสงสุวรรณ All Rights Reserved.</li>
    </footer>

    <script LANGUAGE="JavaScript">
        function confirmSubmit() {
            var agree = confirm("ต้องการที่บันทึกรายการขายฝากใช่หรือไม่?");
            if (agree)
                return true;
            else
                return false;
        }
        // -->
    </script>
    <script LANGUAGE="JavaScript">
        function cancelSubmit() {
            var agree = confirm("ต้องการยกเลิกบันทึกรายการขายฝากใช่หรือไม่?");
            if (agree)
                return true;
            else
                return false;
        }
        // -->
    </script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script src="js/global.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        // Slideshow
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs((slideIndex += n));
        }

        function currentDiv(n) {
            showDivs((slideIndex = n));
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demodots");
            if (n > x.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = x.length;
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-white", "");
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " w3-white";
        }
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.steps.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>