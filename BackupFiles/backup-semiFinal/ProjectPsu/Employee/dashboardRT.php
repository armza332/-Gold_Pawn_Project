<?php require $_SERVER["DOCUMENT_ROOT"] . "/ProjectPsu/Employee/Announce/vendor/autoload.php"; ?>
<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['superadmin_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: login.php');
}

error_reporting(error_reporting() & ~E_NOTICE);
use App\Model\Returnform;
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/date-1.1.2/r-2.2.9/datatables.min.css"/>
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
          <h1 class="h2">รายการไถ่ถอน</h1>
          
        </div>

      <div>
      <form action="">
            <div class="col-5 mb-3 mr-3 align-items-center">
              <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>


            </div>
          </form>
        <table class="table table-striped table-hover" id="returnformdata">
            <thead>
                
                <th class="text-center">รหัสรายการขายฝาก</th>
                <th>ประเภททรัพย์สิน</th>
                <th class="text-center">เลขบัตรประชาชน</th>
                <th class="text-center">ราคาประเมิน</th>
                <th class="text-center">ราคาสุทธิ</th>
                <th class="text-center">วันที่ทำรายการ</th>
                                        
                                        
            </thead>
            <tbody>
                <?php
                    $returnformObj = new Returnform();
                    
                    $returnforms = $returnformObj->getAllReturnform($filters);
                    $n=0;
                    foreach($returnforms as $returnpawn ){
                        $n++;
                        echo "
                        <tr>
                            
                            <td class='text-center'>{$returnpawn["id"]}</td>
                            <td class='text-center'>{$returnpawn["pf_type"]}</td>
                            <td class='text-center'>{$returnpawn["idcard"]}</td>
                            <td class='text-center'>{$returnpawn["pf_price"]}</td>
                            <td class='text-center'>{$returnpawn["pf_netprice"]}</td>
                            <td class='text-center'>{$returnpawn["rt_date"]}</td>
                                                   
                                                   
                                                    
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
            $('#returnformdata').DataTable();
    } );
  </script>
</body>

</html>