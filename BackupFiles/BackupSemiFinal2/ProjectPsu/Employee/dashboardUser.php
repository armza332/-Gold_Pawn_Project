<?php require $_SERVER["DOCUMENT_ROOT"] . "/ProjectPsu/Employee/Announce/vendor/autoload.php"; ?>
<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['superadmin_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: login.php');
}

error_reporting(error_reporting() & ~E_NOTICE);

use App\Model\User;

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
	<link rel="stylesheet" href="CSSgoldpawn copy.css" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

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
  <head>
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark navcolor ">
		<div class="container-fluid">
		<a href="employeePage.php" class="navbar-brand me-auto ms-3 logo" style="width: 11%"
			>	<img src="ห้างทองแสงสุวรรณSuperadmin.png" style="width: 40%" /></a>
			<button class="navbar-toggler buttonCl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
				aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon my-toggler"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					
					<li class="nav-item">
              <a class="nav-link active" aria-current="page" href="superadmin.php">
                <span data-feather="home"></span>
                Analytics
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboardPF.php">
               
                รายการขายฝาก
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboardRT.php">
                </span>
                รายการไถ่ถอน
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboardUnPF.php">
                </span>
                รายการหมดอายุสัญญา
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboardUser.php">
                <span data-feather="users"></span>
                ลูกค้า
              </a>
            </li>
				</ul>
				<span class="navbar-text">
					<form class="container-fluid justify-content-end">
						<a class="btn btn-outline-light me-2 blg" type="button" href="logoutadmin.php">
							<i class="fas fa-user-alt"></i> ผู้จัดการ <?php echo $row['firstname'] ?>
						</a>
					</form>
				</span>
			</div>
		</div>
	</nav>
  </head>
  <div class="container-fluid">
    <div class="row">
      

      <main class="col-md-9 mx-auto col-lg-11 px-md-4 " style="margin-top: 5%">
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
              <th class="text-center">ชื่อ</th>
              <th class="text-center">นามสกุล</th>
              <th class="text-center">อีเมล</th>
              <th class="text-center">เบอร์โทรศัพท์</th>
              <th class="text-center">ที่อยู่</th>
              <th class="text-center">รหัสบัตรประชาชน</th>
              <th class="text-center">วันเกิด</th>
           
              <th class="text-center">วันที่สมัคร</th>
              <th class="text-center">จัดการ</th>

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
                      
                      <td class='text-center '>{$rows["created_at"]}</td>
                      <td class='text-center' style='max-width: 100px;'>
                          <a href='UserFrom.php?id={$rows['id']}&action=edit' 
                          class='mr-10 btn btn-warning'>แก้ไข</a>
                          <a href='UserSave.php?id={$rows['id']}&
                          action=delete' class='btn btn-danger' onclick='return confirmDelete()'>ลบ</a>
                                                       
                      </td>
                      
                                                    
                  </tr>
                                                

                  ";
              }


              ?>
            </tbody>
          </table>
          <div class="text-center mb-2">
              <a type="button" class="btn btn-primary"
                href="UserFrom.php">เพิ่มข้อมูลลูกค้า</a>
              </div> 
        </div>






    </div>
    </main>
  </div>
  </div>
  <script LANGUAGE="JavaScript">
    function confirmDelete() {
      var agree = confirm("ต้องการที่จะลบข้อมูลลูกค้าคนนี้หรือไม่?");
      if (agree)
        return true;
      else
        return false;
    }
  </script>

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