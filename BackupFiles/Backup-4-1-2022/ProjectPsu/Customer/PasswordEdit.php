<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['user_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: index.php');
}

if(isset($_REQUEST['update_id'])) {
  try {
   $id = $_REQUEST['update_id'];
   $stmt = $conn->prepare("SELECT * FROM usersgp WHERE id = :id");
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   extract($row);
 } catch(PDOException $e) {
   $e->getMessage();
 }
}

if (isset($_REQUEST['btn_updatepassword'])) {
  $password_up = $_REQUEST['password'];
  $newpassword_up = $_REQUEST['newpassword'];
  $confirmpassword_up = $_REQUEST['confirmpassword'];
  $oldpassword = $row['gp'];
  $id = $row['id'];
  if(empty($password_up)){
    $errorMsg = "กรุณากรอกรหัสผ่านปัจจุบัน";
  } else if (empty($newpassword_up)) {
    $errorMsg = "กรุณากรอกรหัสผ่านใหม่";
  }else if ($newpassword_up != $confirmpassword_up) {
    $errorMsg = "กรุณายืนยันรหัสผ่านใหม่";
  }else if (strlen($newpassword_up) > 20 || strlen($newpassword_up) < 5) {
    $errorMsg = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
} else { 
    try {
        
    if($password_up == $oldpassword){
                        
                            $update_stmt = $conn->prepare("UPDATE usersgp SET gp = :newpass_up WHERE id =:id");
                            $update_stmt->bindParam(':newpass_up', $newpassword_up);
                            $update_stmt->bindParam(':id',$id);
                            $update_stmt->execute();
                            if($update_stmt->execute()){
                              $updateMsg = "้เปลี่ยนรหัสผ่านเสร็จสิ้น";
                              header("refresh:2;profile.php");
                            }
                         
                    }
                    else {
                        $errorMsg = 'รหัสผ่านปัจจุบันไม่ถูกต้อง';
                    }
    } catch(PDOException $e) {
      echo $e->getMessage();}
}
}
?>
<!DOCTYPE html>
<html>
<title>ห้างทองแสงสุวรรณ</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pridi" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="CSSgoldpawn.css" />

<body>
  <div class="container">
    
  </div>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark navcolor">
    <div class="container-xl">
      <img src="img/ห้างทองแสงสุวรรณ3.png" class="navbar-brand logo" style="width: 25% ; margin-right: 40px;">
      <button class="navbar-toggler buttonCl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon my-toggler"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="UserLandingPage.php">หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AboutUs.php">เกี่ยวกับเรา</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ข่าวสาร
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="Announce.php">ข่าวประชาสัมพันธ์</a></li>
              <li>
                <a class="dropdown-item" href="Promotion.php">ข่าวโปรโมชั่น</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              คำถามที่พบบ่อย
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="FAQNm.php">เรื่องทั่วไป</a>
              </li>
              <li>
                <a class="dropdown-item" href="FAQPawn.php">เกี่ยวกับการจำนำ</a>
              </li>
              <li>
                <a class="dropdown-item" href="FAQinterest.php">ดอกเบี้ย</a>
              </li>
              <li>
                <a class="dropdown-item" href="FAQticket.php">ตั๋วจำนำ</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="calculate.php">คำนวนดอกเบี้ย</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">ติดต่อเรา</a>
          </li>
        </ul class="justify-content-end">
        <span class="navbar-text">
          <form class="container-fluid justify-content-end">
            <li class="nav-item dropdown">
              <a class="btn btn-outline-light me-2 blg dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-alt"></i> <?php echo $row['firstname'] . ' ' . $row['lastname'] ?>
              </a>

              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="Profile.php" style="color: black;">โปรไฟล์</a></li>
                <hr>
                <li>
                  <a class="dropdown-item" href="logout.php" style="color: black;">ออกจากระบบ</a>
                </li>
              </ul>
            </li>

          </form>
        </span>
      </div>
    </div>
  </nav>

    <!-- Head -->
    <div
      class="container-lg"
      style="max-width: 1100px; margin-top: 130px; margin-bottom: 80px"
    >
    <nav
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="UserLandingPage.php">หน้าแรก</a></li>
      <li class="breadcrumb-item"><a href="Profile.php">โปรไฟล์ส่วนตัว</a></li>
      <li class="breadcrumb-item active" aria-current="page">แก้ไขรหัสผ่าน</li>
    </ol>
  </nav>
<?php

if (isset($errorMsg)) { ?>
<div class = "alert alert-danger">
  <strong><?php echo $errorMsg; ?></strong> </div>
<?php } ?>
<?php
if (isset($updateMsg)) { ?>
<div class = "alert alert-success">
  <strong><?php echo $updateMsg; ?></strong> </div>
<?php } ?>

      <div class="container">
        <div class="main-body">
        
             
        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                      <img
                    src="https://bootdey.com/img/Content/avatar/avatar7.png"
                    alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h4>
                          
                          
                         
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                
                <div class="col-lg-8">

					<div class="card">
						<div class="card-body">
            <form method="post">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">รหัสผ่านปัจจุบัน</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="password" class="form-control">
								</div>
							</div>

              <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">รหัสผ่านใหม่</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="newpassword" class="form-control">
								</div>
							</div>
							
              <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">ยืนยันรหัสผ่านใหม่</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="confirmpassword" class="form-control">
								</div>
							</div>
              
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									
                  <button type="button" class="btn btn-succcess px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    บันทึกการแก้ไข
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">รายการแก้ไขรหัสผ่าน</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ต้องการยืนยันการแก้ไขรหัสผ่านนี้ใช่หรือไม่
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" name="btn_updatepassword" class="btn btn-primary">ยืนยันการแก้ไขรหัสผ่าน</button>
                                           
                                        </div>
                                        </div>
                                    </div>
                                    </div> 
                  <a href="Profile.php" class="btn btn-danger px-4" style="color: white;">ยกเลิก</a>
								</div>
							</div>
              </form>
						</div>
					</div>
    
                  
                    
                  </div>
                 
    
    
                </div>
              </div>
    
            </div>
        </div>
      
      
    </div>

    

    <!-- Footer -->

    <footer class="w3-container w3-padding-32 w3-center footerCL">
      <li>Copyright © 2021 ห้างทองแสงสุวรรณ All Rights Reserved.</li>
    </footer>
    <script LANGUAGE="JavaScript">
function confirmSubmit()
{
var agree=confirm("ต้องการบันทึกการเปลี่ยนรหัสผ่านนี้ใช่หรือไม่?");
if (agree)
 return true ;
else
 return false ;
}
// -->
</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
  </body>
</html>
