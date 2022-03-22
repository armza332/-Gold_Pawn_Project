<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['admin_login'])) {
	$_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
	header('location: login.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>จัดการประชาสัมพันธ์</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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
     <!--heading-->
     <div class="container-lg" style="max-width: 1100px; margin-top: 100px; margin-bottom: 60px">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="employeePage.php"
                        style="margin-left:15px; color: black;text-decoration: none;">หน้าแรก</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">จัดการข่าวสาร</li> <!-- แทบด้านบน -->
                <li class="breadcrumb-item active" aria-current="page">รายการข่าวโปรโมชั่น</li>
            </ol>
        </nav>





        <!--content-->

        <section id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
                            <!-- แถบด้านซ้าย -->
                            <a href="" class="list-group-item active main-color-bg">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                            </a>
                            <a href="Announce.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></span> รายการข่าวประชาสัมพันธ์ <span class="badge">12</span>
                            </a>
                            <a href="Promotion.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></span> รายการข่าวโปรโมชั่น <span class="badge">12</span>
                            </a>


                        </div>


                    </div>
                    <div class="col-md-9 box ">
                        <!-- Website Overview -->
                        <div class="panel-default">
                            <div class="heading">
                                <h3 class="">รายการข่าวโปรโมชั่น</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="ค้นหารายการข่าวโปรโมชั่น">
                                    </div>
                                </div>
                                <br>
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>หัวข้อ</th>
                                        <th>การเผยแพร่</th>
                                        <th>วันที่สร้าง</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>ข่าวโปรโมชั่น 1</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true">เผยแพร่แล้ว</span>
                                        </td>
                                        <td>28 ธันวาคม 2021</td>
                                        <td><a class="btn btn-default" href="EditPromotion.php">Edit</a> <a
                                                class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>ข่าวโปรโมชั่น 2</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true">เผยแพร่แล้ว</span>
                                        </td>
                                        <td>1 มกราคม 2022</td>
                                        <td><a class="btn btn-default" href="EditPromotion.php">Edit</a> <a
                                                class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>ข่าวโปรโมชั่น 3</td>
                                        <td><span class="glyphicon glyphicon-remove"
                                                aria-hidden="true">เผยแพร่แล้ว</span></td>
                                        <td>10 มกราคม 2022</td>
                                        <td><a class="btn btn-default" href="EditPromotion.php">Edit</a> <a
                                                class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>ข่าวโปรโมชั่น 4</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true">เผยแพร่แล้ว</span>
                                        </td>
                                        <td>12 มกราคม 2022</td>
                                        <td><a class="btn btn-default" href="EditPromotion.php">Edit</a> <a
                                                class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>

                                    <br>


                                </table>
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"
                                                aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item" aria-current="page">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>


                                <div class="text-center mb-2">
                                    <a type="button" class="btn btn-primary"
                                        href="AddPromotion.php">เพิ่มข่าวโปรโมชั่น</a>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

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