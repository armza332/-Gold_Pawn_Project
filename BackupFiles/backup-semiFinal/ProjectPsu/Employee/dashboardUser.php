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

      $pf = $conn->query("SELECT * FROM usersgp ");  /* AND pf_expdate > now()  */


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
          <h1 class="h2">ข้อมูลลูกค้า</h1>
          
        </div>


        <div class="col">
          <form action="">
            <div class="col-5 mb-3 mr-3 align-items-center">
              <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>


            </div>
          </form>
          <table class="table table-striped table-hover" id="pawnformdata">
            <thead>

              <th class="text-center">ลำดับ</th>
              <th>ชื่อ</th>
              <th class="text-center">นามสกุล</th>
              <th class="text-center">อีเมล</th>
              <th class="text-center">เบอร์โทรศัพท์</th>
              <th class="text-center">ที่อยู่</th>
              <th class="text-center">รหัสบัตรประชาชน</th>
              <th class="text-center">วันเกิด</th>
              <th class="text-center">ระดับ</th>
              <th class="text-center">วันที่สมัคร</th>

            </thead>
            <tbody>
              <?php
             
              $n = 0;
              foreach ($pf as $rows) {
                $n++;
                
                echo "
                  <tr>
                      <td class='text-center'>$n</td>
                      <td class='text-center'>{$rows["firstname"]}</td>
                      <td class='text-center'>{$rows["lastname"]}</td>
                      <td class='text-center'>{$rows["email"]}</td>
                      <td class='text-center'>{$rows["phonenumber"]}</td>
                      <td class='text-center text-truncate'>{$rows["address"]}</td>
                      <td class='text-center '>{$rows["idcard"]}</td>
                      <td class='text-center '>{$rows["birthday"]}</td>
                      <td class='text-center '>{$rows["urole"]}</td>
                      <td class='text-center '>{$rows["created_at"]}</td>
                      
                                                    
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