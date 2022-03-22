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
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSSgoldpawn.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script> <!-- ทำให้ Editor ทำงาน -->
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
                    <a href="LandingPageEmployee.html"
                        style="margin-left:15px; color: black;text-decoration: none;">หน้าแรก</a>
                </li>
                
                <li class="breadcrumb-item active" aria-current="page">รายการข่าวประชาสัมพันธ์</li>
                <li class="breadcrumb-item active" aria-current="page">เพิ่มข่าวประชาสัมพันธ์</li>
            </ol>
        </nav>




        <!--content-->
        <section id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
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
                    <div class="col-md-9 box">
                        <!-- Website Overview -->
                        
                        <div class="panel panel-default">
                            <div class="heading">
                                <h3 class="">เพิ่มข่าวประชาสัมพันธ์</h3>
                            </div>
                            <div class="panel-body">
                                <form action="AddAn_db.php" method="post">
                                <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
                                <div class="form-group">
                                        <label>หัวข้อ</label>
                                        <input type="text" name="an_title" class="form-control" placeholder="หัวข้อข่าวโปรโมชั่น"
                                            >
                                    </div><br>
                                    <div class="form-group">
                                        <label>เนื้อหา</label>
                                        <textarea name="editor1" class="form-control"
                                            placeholder="เนื้อหาข่าวโปรโมชั่น">

                            </textarea>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="an_status"> เผยแพร่
                                        </label>
                                    </div>
                                    <br>

                                    <div>
                                        <label>วันที่เผยแพร่</label>
                                        <input type="date" name="an_date" class="form-control">
                                    </div>
                                    <br>
                                    
                                    <div class="form-group">
                                        <label>หมายเหตุ</label>
                                        <input type="text" name ="an_note" class="form-control" placeholder="เพิ่มหมายเหตุ">

                                    </div>
                                    <br>
                                    <!-- Button trigger modal -->
                                    <button type="submit" class="btn-lg btn-primary mb-2"
                                        name="savean">
                                        บันทึก
                                    </button>

                                    




                                </form>
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
    <script>
        CKEDITOR.replace('editor1');
    </script>


</body>

</html>