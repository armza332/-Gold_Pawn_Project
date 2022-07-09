<?php require $_SERVER["DOCUMENT_ROOT"] . "/ProjectPsu/Employee/Announce/vendor/autoload.php"; ?>
<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['superadmin_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: login.php');
}
use App\Model\User;

error_reporting(error_reporting() & ~E_NOTICE);
if($_REQUEST['action']=='edit'){
    $userObj = new User;
    $usersgp = $userObj->getAllUserById($_REQUEST['id']);
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
  <title>ADMIN</title>

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
							<i class="fas fa-user-alt"></i> ผู้จัดการ : <?php echo $row['firstname'] ?>
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
        <h3><?php echo ($_REQUEST['action']=='edit') ? "แก้ไขข้อมูลลูกค้า" : "เพิ่มข้อมูลลูกค้า";?></h3>
          
        </div>


        <div class="col">
          <form action="">
            <div class="col-5 mb-3 mr-3 align-items-center">
              <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>


            </div>
          </form>
          <form action="UserSave.php" method="POST" ">
                <input type="hidden" name="action" value="<?php echo ($_REQUEST['action']=='edit') ? "edit" : "add";?>">
                <input type="hidden" name="id"  value="<?php echo $usersgp['id'];?>">
                <div class="form-group">
                    <label for="firstname" class="mb-2">ชื่อ</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="ชื่อ"
                    value="<?php echo $usersgp['firstname']; ?>">

                    <label for="lastname" class="mb-2">นามสกุล</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="นามสกุล"
                    value="<?php echo $usersgp['lastname']; ?>">

                </div><br>
                <div class="form-group">
                    <label for="email" class="mb-2">E-mail</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="E-mail"
                    value="<?php echo $usersgp['email']; ?>">

                    <label for="phonenumber" class="mb-2">เบอร์โทรศัพท์</label>
                    <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="เบอร์โทรศัพท์"
                    value="<?php echo $usersgp['phonenumber']; ?>">
                </div>

                <div class="form-group">
                    <label for="address" class="mb-2">ที่อยูู่</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="ที่อยู่"
                    value="<?php echo $usersgp['address']; ?>">

                    <label for="idcard" class="mb-2">รหัสบัตรประชาชน</label>
                    <input type="text" name="idcard" id="idcard" class="form-control" placeholder="รหัสบัตรประชาชน"
                    value="<?php echo $usersgp['idcard']; ?>">
                </div>
                                    
                <br>
                <div>
                    <label for="birthday" class="mb-2">วันเกิด</label>
                    <input type="date" name="birthday" id="birthday" class="form-control"  placeholder="วันเกิด"
                    value="<?php echo $usersgp['birthday']; ?>">
                </div>
                <br>
                                    
                                    
                                    
                <div class="text-center mb-2">
                    <a type="button" class="btn btn-secondary"
                    href="dashboardUser.php">ย้อนกลับ</a>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        บันทึก
                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ข้อมูลลูกค้า</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ต้องการบันทึกใช่หรือไม่
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            
                                            <button class="btn btn-primary" type="submit">บันทึก</button> 
                                        </div>
                                        </div>
                                    </div>
                                    </div> 
                                        
                                                   
                    
                                        
                </div> 
                                    
            </form>
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