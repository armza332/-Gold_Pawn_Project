<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['admin_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: login.php');
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
  <title>ฟอร์มรายการไถ่ถอน</title>
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
    if (isset($_SESSION['admin_login'])) {
      $check = $_POST['searchactivepawn'];
      $pf = $conn->query("SELECT * FROM pawnform WHERE pf_status = '0'");
      $pf->execute();
      $rows = $pf->fetch(PDO::FETCH_ASSOC);
    }
    if (isset($_POST['searchactivepawn'])) {
      $idcard = $_POST['idcard'];
      if ($idcard != '') {
        $pf = $conn->query("SELECT * FROM pawnform WHERE idcard = $idcard AND pf_status='จำนำ'");
        $nm = $conn->query("SELECT * FROM usersgp WHERE idcard = $idcard");
        $pf->execute();
        $nm->execute();
        $rows = $pf->fetch(PDO::FETCH_ASSOC);
        $rowss = $nm->fetch(PDO::FETCH_ASSOC);
        $title = $rowss['title'];
        $firstname = $rowss['firstname'];
        $lastname = $rowss['lastname'];
      } else {
        $_SESSION['warning'] = 'กรุณากรอกรหัสบัตรประชาชนลูกค้า';
        header("location: continueform.php");
      }
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
              <li><a class="dropdown-item" href="Announce.php">ข่าวประชาสัมพันธ์</a></li>
              <li>
                <a class="dropdown-item" href="Promotion.php">ข่าวโปรโมชั่น</a>
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
        <li class="breadcrumb-item active" aria-current="page">รายการต่อดอกเบี้ย</li>
      </ol>
    </nav>
  </div>
  <div class="page-wrapper  p-t-50 p-b-50 font-robo">
    <div class="wrapper wrapper--w960">
      <div class="card card-2">
        <div class="card-heading"></div>
        <div class="card-body">
          <div class="container">
            <h3 class=" title"> รายการต่อดอกเบี้ย</h3>

            <form action="continueform.php" method="post">

              <!--Form-->

              <div class="row">
                <div class="col-4">
                  <div class="input-group">
                    <input type="text" class="input--style-2" name="idcard" placeholder="รหัสบัตรประชาชนลูกค้า">
                  </div>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-warning margin-left" name="searchactivepawn">ค้นหา</button>
                </div>
              </div>
            </form>

            <h4 class=" title2 fw-bold mb-3">ข้อมูลการขายฝาก :</h4>
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





            <?php foreach ($pf as $rows) { ?>

              <?php
              $num1 = $rows['pf_price'];
              $date1 = $rows['pf_create_at'];
              $date2 = $rows['currenttime'];
              $current_interestpaid = $rows['current_interestpaid'];

              $ts1 = strtotime($date1);
              $ts2 = strtotime($date2);

              $year1 = date('Y', $ts1);
              $year2 = date('Y', $ts2);

              $month1 = date('m', $ts1);
              $month2 = date('m', $ts2);

              $diff = (($year2 - $year1) * 12) + ($month2 - $month1);



              $resultnet = ($num1 * $diff) * 3 / 100;
              $resultnets =  $resultnet - $current_interestpaid;
              $results = $num1 + $resultnets;

              ?>

              <form action="" method="post">
                <div style="border: 3px solid; padding: 10px;margin-bottom:20px; border-radius: 0.5rem;" class="ps-4 pe-4">
                  <div class="row mb-2 mt-2">
                    <div class="col-4">
                      <h4 style="">รหัสรายการขายฝาก : <?php echo $rows['id']; ?></h4>
                    </div>
                    <div class="col-1">
                      <div class="input-group2">
                        <input type="hidden" class="input--style-2 " name="id" placeholder="id" value="<?php echo $rows['id']; ?>">
                      </div>
                    </div>
                    <div class="col-2 ms-auto">
                      <h3 style="color: green;"><?php echo $rows['pf_status']; ?></h3>
                    </div>

                  </div>
                  <div class="row mb-3">
                    <div class="col-4 ">

                    </div>
                    <div class="col-4 mb-3 mt-2">
                      <img src=" <?php echo $rows['picture']; ?>" class="picture img-thumbnail">

                    </div>
                    <div class="col-4 ">

                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-3">
                      <label>ประเภท : <?php echo $rows['pf_type']; ?></label>
                    </div>
                    <div class="col-3">
                      <label>น้ำหนัก : <?php echo $rows['pf_weight']; ?> กรัม</label>
                    </div>
                    <div class="col">
                      <label>ราคาประเมิน : <?php echo $rows['pf_price']; ?> บาท</label>
                    </div>

                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <label>รหัสบัตรประชาชนลูกค้า: <?php echo $rows['idcard']; ?></label>
                    </div>
                    <div class="col-5">
                      <label>ชื่อสกุล: <?php echo $title; ?>.<?php echo $firstname; ?> <?php echo $lastname; ?></label>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col">
                      <label>วันที่เริ่มจำนำ : <?php echo $rows['pf_create_at']; ?></label>
                    </div>
                    <div class="col">
                      <label>วันหมดอายุสัญญา: <?php echo $rows['pf_expdate']; ?></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      <label>หมายเหตุ : <?php echo $rows['pf_des']; ?></label>
                      <input type="hidden" class="input--style-2 " name="idcard" value="<?php echo $rows['idcard']; ?>">
                      <input type="hidden" class="input--style-2 " name="pf_type" value="<?php echo $rows['pf_type']; ?>">
                      <input type="hidden" class="input--style-2 " name="pf_price" value="<?php echo $rows['pf_price']; ?>">
                      <input type="hidden" class="input--style-2 " name="pf_netprice" value="<?php echo $results; ?>">
                    </div>

                  </div>

                  <div class="row mb-1">
                    <div class="col d-flex flex-row-reverse">

                      <label class="ms-4" style="padding-top: 15px;" style="">ราคาชำระสุทธิ : <?php echo $results; ?></label>
                      <label style="padding-top: 15px;">ดอกเบี้ย : <?php echo $resultnets; ?> บาท</label>
                    </div>
                    <div class="col-2 d-flex flex-row-reverse">
                      <a class="btn btn-danger" href="Addcontinue.php?continueID=<?php echo $rows['id']; ?> " style="color: white;" onclick="return confirmSubmit()">ทำรายการ</a>

                    </div>

                  </div>
                </div>
              </form>
            <?php } ?>

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
      var agree = confirm("ต้องการที่จะทำรายต่อดอกเบี้ยรายการนี้หรือไม่?");
      if (agree)
        return true;
      else
        return false;
    }
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