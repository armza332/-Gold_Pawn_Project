<?php require $_SERVER["DOCUMENT_ROOT"]."/ProjectPsu/Employee/Announce/vendor/autoload.php";?>
<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['admin_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: login.php');
}

?>
<?php
use App\Model\Announce;

error_reporting(error_reporting() & ~E_NOTICE);
if($_REQUEST['action']=='edit'){
    $announceObj = new Announce;
    $announce = $announceObj->getAllAnnounceById($_REQUEST['id']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>แบบฟอร์มรายการข่าวสารประชาสัมพันธ์</title>
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
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script> <!-- ทำให้ editor ทำงาน -->
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
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark navcolor ">
		<div class="container-fluid me-4 ">
		<a href="employeePage.php" class="navbar-brand me-auto ms-5 logo" style="width: 47%"
			>	<img src="ห้างทองแสงสุวรรณ3.png" style="width: 47%" /></a>
			<button class="navbar-toggler buttonCl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
				aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon my-toggler"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="employeePage.php">Dashboard</a>
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
							<li><a class="dropdown-item" href="AddAnnounce.php">ข่าวสารประชาสัมพันธ์</a></li>
							<li>
								<a class="dropdown-item" href="AddPromotion.php">ข่าวสารโปรโมชั่น</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="signinadmin.php">รายงานสรุปผล </a>
					</li>
				</ul>
				<span class="navbar-text">
					<form class="container-fluid justify-content-end">
						<a class="btn btn-outline-light me-3 blg " type="button" href="logout.php">
							<i class="fas fa-user-alt"></i> พนักงาน : <?php echo $row['firstname']  ?>
						</a>
					</form>
				</span>
			</div>
		</div>
	</nav>

	<!--heading-->
	<div class="container-lg" style="max-width: 1100px; margin-top: 7%; margin-bottom: 60px">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="employeePage.php"
                        style="margin-left:15px; color: black;text-decoration: none;">Dashboard</a>
                </li>
                
                <li class="breadcrumb-item active" aria-current="page">รายการข่าวสารประชาสัมพันธ์</li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo ($_REQUEST['action']=='edit') ? "แก้ไขข้อมูลข่าวสารประชาสัมพันธ์" : "เพิ่มข่าวสารประชาสัมพันธ์";?></li>
            </ol>
        </nav>





        <!--content-->

        <section id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group list-group-item-action">
                            <!-- แถบด้านซ้าย -->
                            
                            <a href="AddAnnounce.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></span> รายการข่าวสารประชาสัมพันธ์ <span class="badge"></span>
                            </a>
                            <a href="AddPromotion.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></span> รายการข่าวสารโปรโมชั่น <span class="badge">12</span>
                            </a>


                        </div>


                    </div>
                    <div class="col-md-9 box ">
                        <!-- Website Overview -->
                        <div class="panel-default">
                            <div class="heading">
                                <h3><?php echo ($_REQUEST['action']=='edit') ? "แก้ไขข้อมูลข่าวสารประชาสัมพันธ์" : "เพิ่มข่าวสารประชาสัมพันธ์";?></h3>
                            </div>
                            <div class="panel-body">
                                <form action="AnnounceSave.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="<?php echo ($_REQUEST['action']=='edit') ? "edit" : "add";?>">
                                    <input type="hidden" name="id"  value="<?php echo $announce['id'];?>">
                                    <div class="form-group">
                                        <label for="header" class="mb-2">หัวข้อ</label>
                                        <input type="text" name="header" id="header" class="form-control" placeholder="หัวข้อข่าวสารประชาสัมพันธ์"
                                        value="<?php echo $announce['header']; ?>">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="content" class="mb-2">เนื้อหา</label>
                                        <textarea name="content" id="content" class="form-control"><?php echo $announce['content'];?>
                                        </textarea>
                                    </div>
                                    
                                    <br>
                                    <div>
                                        <label for="doc" class="mb-2">วันที่เผยแพร่</label>
                                        <input type="date" name="doc" id="doc" class="form-control" value="<?php echo $announce['doc']; ?>">
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <label for="ีupload" class="mb-2">รูปภาพ</label>
                                        <input type="file" name="upload" id="upload" class="form-control">
                                        <input type="hidden" name="picture" id="picture" class="form-control" value="<?php echo $announce['picture']; ?>">
                                    </div>
                                    
                                    
                                    <div class="text-center mb-2">
                                    <a type="button" class="btn btn-primary"
                                        href="AddAnnounce.php">ย้อนกลับ</a>

                                   
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    บันทึก
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข่าวสารประชาสัมพันธ์</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ต้องการเพิ่มข่าวสารประชาสัมพันธ์ใช่หรือไม่
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-primary" >บันทึก</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>  
                                        
                                    </div> 
                                    
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
    <script LANGUAGE="JavaScript">
function confirmsave()
{
var agree=confirm("ต้องการเพิ่มข่าวสารประชาสัมพันธ์นี้ใช่หรือไม่?");
if (agree)
 return true ;
else
 return false ;
}
// -->
</script>
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
       CKEDITOR.replace('content');
    </script>
    
</body>

</html>