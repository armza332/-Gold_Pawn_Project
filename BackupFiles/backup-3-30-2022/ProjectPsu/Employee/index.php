<?php 

    session_start();
    require_once 'config/db.php';
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css" />
	<link rel="stylesheet" type="text/css"
		href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
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
			<img src="ห้างทองแสงสุวรรณ3.png" class="navbar-brand logo" style="width: 25%; margin-right: 40px"
				href="employeePage.php" />
			<button class="navbar-toggler buttonCl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
				aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon my-toggler"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="employeePage.php">หน้าแรก</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
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
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
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
							<i class="fas fa-user-alt"></i> เข้าสู่ระบบ
						</a>
					</form>
				</span>
			</div>
		</div>
	</nav>

	<!--heading-->
	<div class="container-lg" style="max-width: 1100px; margin-top: 100px; margin-bottom: 60px">
		<nav style="
          --bs-breadcrumb-divider: url(
            &#34;data:image/svg + xml,
            %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='currentColor'/%3E%3C/svg%3E&#34;
          );
          ; margin-bottom: 50px" aria-label="breadcrumb">
			<ol class="breadcrumb">

				<li class="breadcrumb-item active" aria-current="page">หน้าแรก</li>
			</ol>
		</nav>


    <div class="container-fluid bordersr" style="margin-bottom: 20px;">
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btncl" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
    
		<!--content-->
		<h1 class="title" style="margin-bottom:10px;">Menu</h1>
		
			<div class="row">


				<div class="d-grid gap-2 mx-auto col">
					<a href="login.php" class="mybtn">รายการขายฝาก</a>
				</div>

				<div class="d-grid gap-2 mx-auto col">
					<a href="login.php" class="mybtn">รายการไถ่ถอน</a>
				</div>
			</div>

			<div class="row">
				<div class="d-grid gap-2 mx-auto col">
					<a href="login.php" class="mybtn">รายการต่อดอกเบี้ย</a>
				</div>
				<div class="d-grid gap-2 mx-auto col">
					<a href="login.php" class="mybtn">รายการเพิ่มเงินต้น</a>
				</div>
			</div>

			<div class="row">
				<div class="d-grid gap-2 mx-auto col">
					<a href="login.php" class="mybtn">รายการขำระเงินต้น</a>
				</div>
				<div class="d-grid gap-2 mx-auto col">
					<a href="login.php" class="mybtn">สมัครสมาชิกลูกค้า</a>
				</div>
			</div>
      <div class="row">
				<div class="d-grid gap-2 mx-auto col">
					<a href="login.php" class="mybtn">จัดการประชาสัมพันธ์</a>
				</div>
				<div class="d-grid gap-2 mx-auto col">
					<a href="login.php" class="mybtn">จัดการโปรโมชั่น</a>
				</div>
			</div>
      <a href="signinadmin.php" class="mybtn">รายงานสรุปผล</a>

	</div>

	<footer class="w3-container w3-padding-32 w3-center footerCL">
		<li>Copyright © 2021 ห้างทองแสงสุวรรณ All Rights Reserved.</li>
	</footer>
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