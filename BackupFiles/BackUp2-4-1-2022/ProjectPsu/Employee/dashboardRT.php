<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['superadmin_login'])) {
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
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dashboard</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <?php

    if (isset($_SESSION['superadmin_login'])) {
      $superadmin_id = $_SESSION['superadmin_login'];
      $stmt = $conn->query("SELECT * FROM users WHERE id = $superadmin_id");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    if (isset($_SESSION['superadmin_login'])) {
      $rt = $conn->query("SELECT * FROM returnpawn");
      
      $rt->execute();
      $rows = $rt->fetch(PDO::FETCH_ASSOC);
      
    }

    ?>

  </div>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <img src="ห้างทองแสงสุวรรณ3.png" class="navbar-brand logo" style="width: 13% ; padding-left: 10px;padding-right: 15px" href="landingpageTest.html" />
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="employeePage.php">กลับสู่หน้าหลัก</a>
      </div>
    </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" style="margin-right: 50px;margin-left: 20px;" type="text" placeholder="Search" aria-label="Search">

  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="employeePage.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboardPF.php">
                <span data-feather="file"></span>
                รายการขายฝาก
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboardRT.php">
                <span data-feather="file"></span>
                รายการไถ่ถอน
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                ลูกค้า
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                รายงาน
              </a>
            </li>

          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>รายงานที่บันทึกไว้</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                รายงานการขายฝากเดือนปัจจุบัน
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                รายงานการขายฝากไตรมาสที่แล้ว
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                รายการการขายฝากประจำปี
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">แชร์</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">นำออก</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              สัปดาห์นี้
            </button>
          </div>
        </div>

        <?php foreach ($rt as $rows) { ?>
          <?php
          $userid =$rows['idcard'];
          $nm = $conn->query("SELECT * FROM usersgp WHERE idcard = $userid");
      
      $nm->execute();
     
      $rowss = $nm->fetch(PDO::FETCH_ASSOC);
      $title = $rowss['title'];
      $firstname = $rowss['firstname'];
      $lastname = $rowss['lastname'];
      ?>
          <form action="returnform_db.php" method="post">
            <div style="border: 3px solid; padding: 10px;margin-bottom:20px; border-radius: 0.5rem;">
              <div class="row mb-1">
                <div class="col-3">
                  <h5>ลำดับที่ขายฝาก : <?php echo $rows['id']; ?></h5>
                </div>

              </div>



              <div class="row mb-2">

                <div class="col">
                  <label>ประเภท : <?php echo $rows['pf_type']; ?></label>
                </div>
                <div class="col">
                  <label>ราคาประเมิน : <?php echo $rows['pf_price']; ?> บาท</label>
                </div>
                <div class="col">
                  <label>ราคาชำระสุทธิ : <?php echo $rows['pf_netprice']; ?> บาท</label>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-4">
                  <label>รหัสบัตรประชาชนลูกค้า: <?php echo $rows['idcard']; ?></label>
                </div>
                <div class="col-5">
                  <label>ชื่อสกุล: <?php echo $title; ?>.<?php echo $firstname; ?> <?php echo $lastname; ?></label>
                </div>
              </div>

              <div class="row mb-2">
                <div class="col">
                  <label>วันที่ไถ่ถอน : <?php echo $rows['rt_date']; ?></label>
                </div>

              </div>
            </div>
          </form>
        <?php } ?>



    </div>
    </main>
  </div>
  </div>


  <script src="js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>