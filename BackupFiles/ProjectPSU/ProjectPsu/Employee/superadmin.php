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
  <title>ADMIN</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/date-1.1.2/r-2.2.9/datatables.min.css" />


  <link rel="stylesheet" href="admin.css" />
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  

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
  <style>
    

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

      $con = mysqli_connect("localhost", "root", "", "registration_system");
      mysqli_set_charset($con, "utf8");

      $sql  = "SELECT SUM(pf_price) AS pf_price, DATE_FORMAT(pf_create_at, '%M-%Y') AS pf_create_at
      FROM pawnform
      GROUP BY DATE_FORMAT(pf_create_at,'%Y%''%m%')";
      $resultG = mysqli_query($con, $sql);
      $pf_create_at = array();
      $pf_price = array();
      while($roww=mysqli_fetch_assoc($resultG)){
        $pf_create_at[] = $roww['pf_create_at'];
        $pf_price[] = $roww['pf_price'];
      }
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
          <h1 class="h2">กราฟแสดงราคาประเมินสะสมประจำเดือน</h1>
          
        </div>


        <figure class="highcharts-figure">
          <div id="container"></div>

        </figure>


        <h2>ตาราง</h2>
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="pawnformdata">
            <thead>
           
              <th class="text-center">รหัสรายการขายฝาก</th>
              <th class="text-center">ประเภททรัพย์สิน</th>
              <th class="text-center">น้ำหนัก</th>
              <th class="text-center">เลขบัตรประชาชน</th>
              <th class="text-center">วันที่ทำรายการขายฝาก</th>
              <th class="text-center">วันหมดอายุสัญญา</th>
              <th class="text-center">ราคาประเมิน</th>
             

            </thead>
            <tbody>
              <?php

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
                      <td class='text-truncate text-center'>{$rows["pf_type"]}</td>
                      <td class='text-center'>{$rows["pf_weight"]}</td>
                      <td class='text-center'>{$rows["idcard"]}</td>
                      <td class='text-center'>{$rows["pf_create_at"]}</td>
                      <td class='text-center'>{$rows["pf_expdate"]}</td>
                      <td class='text-center'>{$rows["pf_price"]}</td>
                     
                      
                                                    
                  </tr>
                                                

                  ";
              }


              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <script>
    Highcharts.chart('container', {

title: {
  text: ''
},

subtitle: {
  text: 'ราคาประเมินสะสมประจำเดือน'
},

yAxis: {
  title: {
    text: 'ราคาประเมินสะสม'
  }
},
xAxis: {
  title: {
    text: 'เดือน-ปี(คศ)'
  },
  categories: [<?php echo "'". implode("','" , $pf_create_at). "'"; ?>]
},



legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},



series: [{
  name: 'ราคาประเมินสะสมต่อเดือน',
  data: [<?php echo implode(",",$pf_price); ?>]
}],

responsive: {
  rules: [{
    condition: {
      maxWidth: 500
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});
  </script>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.steps.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="js/dashboard.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/date-1.1.2/r-2.2.9/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#pawnformdata').DataTable();
    });
  </script>


</body>

</html>