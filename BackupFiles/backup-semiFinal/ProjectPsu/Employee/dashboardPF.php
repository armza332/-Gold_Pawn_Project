<?php require $_SERVER["DOCUMENT_ROOT"] . "/ProjectPsu/Employee/Announce/vendor/autoload.php"; ?>
<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['superadmin_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: login.php');
}

error_reporting(error_reporting() & ~E_NOTICE);

use App\Model\Pawnform;

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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/date-1.1.2/r-2.2.9/datatables.min.css" />



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

      $pf = $conn->query("SELECT * FROM pawnform WHERE pf_status='จำนำ' AND pf_expdate > now()");  /* AND pf_expdate > now()  */


      $pf->execute();

      $rows = $pf->fetch(PDO::FETCH_ASSOC);
    }

    ?>

  </div>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <img src="ห้างทองแสงสุวรรณ3.png" class="navbar-brand logo" style="width: 13% ; padding-left: 10px;padding-right: 15px" href="landingpageTest.html" />
    <div class="navbar-nav">
      <div class="nav-item text-nowrap me-auto">
        <a class="nav-link px-3 " href="employeePage.php">กลับสู่หน้าหลัก</a>
      </div>
    </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   

  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="superadmin.php">
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
              <a class="nav-link" href="dashboardUnPF.php">
                <span data-feather="file"></span>
                รายการหลุดจำนำ
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboardUser.php">
                <span data-feather="users"></span>
                ลูกค้า
              </a>
            </li>
           

          </ul>
<hr>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">รายการขายฝาก</h1>
          
        </div>


        <div class="col">
          <form action="">
            <div class="col-5 mb-3 mr-3 align-items-center">
              <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>


            </div>
          </form>
          <table class="table table-striped table-hover" id="pawnformdata">
            <thead>
              <th class="text-center">รหัสรายการขายฝาก</th>
              <th>ประเภททรัพย์สิน</th>
              <th class="text-center">น้ำหนัก</th>
              <th class="text-center">เลขบัตรประชาชน</th>
              <th class="text-center">วันที่ทำรายการ</th>
              <th class="text-center">วันหมดอายุสัญญา</th>
              <th class="text-center">ราคาประเมิน</th>
              <th class="text-center">หมายเหตุ</th>
              <th class="text-center">สถานะสัญญา</th>

            </thead>
            <tbody>
              <?php
              $pawnformObj = new Pawnform();

              $pawnforms = $pawnformObj->getAllPawnform($filters);
              $n = 0;
              foreach ($pf as $rows) {
                $n++;
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
  
  
  
                $start_date = $date1;
                $expire_date = $rows['pf_expdate'];
                $today_date = date("d-m-Y");
  
                /* Start Date */
                $start_explode = explode("-", $start_date);
                $start_day = $start_explode[2];
                $start_month = $start_explode[1];
                $start_year = $start_explode[0];
  
                /* Expire Date */
                $expire_explode = explode("-", $expire_date);
                $expire_day = $expire_explode[2];
                $expire_month = $expire_explode[1];
                $expire_year = $expire_explode[0];
  
                /* Today Date */
                $today_explode = explode("-", $today_date);
                $today_day = $today_explode[0];
                $today_month = $today_explode[1];
                $today_year = $today_explode[2];
  
                $start = gregoriantojd($start_month, $start_day, $start_year);
                $expire = gregoriantojd($expire_month, $expire_day, $expire_year);
                $today = gregoriantojd($today_month, $today_day, $today_year);
  
  
                $date_current = $expire - $today; //หาวันที่ยังเหลืออยู่
                $pfstatus = $rows['pf_status'];
                $pfstatus2 = $rows['pf_status'];
                if ($date_current > 0) {
                  $pfstatus = "<h5 style='color: green;'>$pfstatus2</h5>";
                } else if ($date_current <= 0) {
                  $pfstatus = "<h5 style='color: red;'>หลุดจำนำ</h5>";
                }
                echo "
                  <tr>
                      <td class='text-center'>{$rows["id"]}</td>
                      <td class='text-truncate'>{$rows["pf_type"]}</td>
                      <td class='text-center'>{$rows["pf_weight"]}</td>
                      <td class='text-center'>{$rows["idcard"]}</td>
                      <td class='text-center'>{$rows["pf_create_at"]}</td>
                      <td class='text-center'>{$rows["pf_expdate"]}</td>
                      <td class='text-center'>{$rows["pf_price"]}</td>
                      <td class='text-center text-truncate'>{$rows["pf_des"]}</td>
                      <td class='text-center'>{$pfstatus}</td>
                                                    
                  </tr>
                                                

                  ";
              }


              ?>
            </tbody>
          </table>
        </div>






    </div>
    </main>
  </div>
  </div>


  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.steps.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="js/dashboard.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/date-1.1.2/r-2.2.9/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#pawnformdata').DataTable();
    });
  </script>
</body>

</html>