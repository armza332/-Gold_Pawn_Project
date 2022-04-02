<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['user_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: index.php');
}

?>
<!DOCTYPE html>
<html>
<title>โปรไฟล์ส่วนตัว</title>
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
    <?php

    if (isset($_SESSION['user_login'])) {
      $user_id = $_SESSION['user_login'];
      $stmt = $conn->query("SELECT * FROM usersgp WHERE id = $user_id");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $iduser= $row['idcard'];
    } if (isset($_SESSION['user_login'])) {
      $num_per_page = 6;

      if (isset($_GET["page"])) {
        $page = $_GET["page"];
      } else {
        $page = 1;
      }

      $start_from = ($page - 1) * 5;

      $pf = $conn->query("SELECT * FROM pawnform WHERE idcard = $iduser limit $start_from,$num_per_page");
      $nm= $conn->query("SELECT * FROM usersgp WHERE idcard");
      $pf->execute();
      $nm->execute();
      $rows = $pf->fetch(PDO::FETCH_ASSOC);
      $rowss = $nm->fetch(PDO::FETCH_ASSOC);
      $title = $rowss['title'];
      $firstname = $rowss['firstname'];
      $lastname = $rowss['lastname'];
    }
    ?>
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
  <div class="container-lg" style="max-width: 1100px; margin-top: 130px; margin-bottom: 80px">
    <nav
      style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
      aria-label="breadcrumb">
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="UserLandingPage.php">หน้าแรก</a></li>
      <li class="breadcrumb-item"><a href="profile.php">โปรไฟล์ส่วนตัว</a></li>
        <li class="breadcrumb-item active" aria-current="page">ประวัติรายการขายฝาก</li>
      </ol>
    </nav>

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
          <div class="col-md-8">
          <div class="row gutters-sm">
              <div class="col mb-3">
                <div class="card h-100">
                  <div class="card-body">
                  <h3 class="d-flex align-items-center mb-2">ประวัติรายการขายฝากของ <?php echo $row['firstname']; ?></h3>
                  
                  <?php foreach ($pf as $rows) { ?>

<?php
$num1 = $rows['pf_price'];
$date1 = $rows['pf_create_at'];
$date3 = $rows['pf_expdate'];
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
$pfstatus=$rows['pf_status'];
$pfstatus2=$rows['pf_status'];
if ($pfstatus =='ไถ่ถอนแล้ว'){
  $pfstatus="<h4 style='color: gold;'>ไถ่ถอน</h4>";
}else if ($date_current <= 0){
$pfstatus="<h4 style='color: red;'>หลุดจำนำ</h4>";
}else if ($date_current > 0){
  $pfstatus="<h4 style='color: green;'>$pfstatus2</h4>";
  }
?>

<form action="" method="post">
  <div style="border: 3px solid; padding: 10px;margin-bottom:20px; border-radius: 0.5rem;" class="ps-4 pe-4">
    <div class="row mb-2 mt-2">
      <div class="col-5">
        <h5 style="">รหัสรายการขายฝาก : <?php echo $rows['id']; ?></h5>
      </div>
      <div class="col-1">
        <div class="input-group2">
          <input type="hidden" class="input--style-2 " name="id" placeholder="id" value="<?php echo $rows['id']; ?>">
        </div>
      </div>
      <div class="col-2 ms-auto">
        <?php echo $pfstatus; ?>
      </div>

    </div>
    <div class="row mb-3">
      <div class="col-4 ">

      </div>
      <div class="col-4 mb-3 mt-2">
        <img src=" <?php echo $rows['picture']; ?>" class="picture img-thumbnail">

      </div>
      <div class="col-4 ">

      </div>
    </div>



    <div class="row mb-3">
      <div class="col-3">
        <label>ประเภท : <?php echo $rows['pf_type']; ?></label>
      </div>
      <div class="col-3">
        <label>น้ำหนัก : <?php echo $rows['pf_weight']; ?> กรัม</label>
      </div>
      <div class="col">
        <label>ราคาประเมิน : <?php echo $rows['pf_price']; ?> บาท</label>
      </div>

    </div>
    

    <div class="row mb-3">
      <div class="col">
        <label>วันที่เริ่มจำนำ : <?php echo $rows['pf_create_at']; ?></label>
      </div>
      <div class="col">
        <label>วันหมดอายุสัญญา : <?php echo $rows['pf_expdate']; ?></label>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>หมายเหตุ : <?php echo $rows['pf_des']; ?></label>
      </div>

    </div>

    <div class="row mb-1">
      <div class="col d-flex flex-row-reverse">
        <label class="ms-4" style="padding-top: 15px;" style="">ราคาค้างชำระสุทธิ : <?php echo $results; ?></label>
        <label style="padding-top: 15px;">ดอกเบี้ย : <?php echo $resultnets; ?> บาท</label>
      </div>


    </div>
  </div>
</form>

<?php } ?>


<div class="col-3 ms-auto " >

<?php

for ($i = 1; $i <=3;$i++) {
  echo "<a href='historypf.php?page=" . $i . "' style='font-size: 150%;'>"."[ " . $i . " ] "."</a>";
 
}
?>

</div>


                  </div>
                </div>
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
  <script src="js/bootstrap.min.js"></script>

  </script>
</body>

</html>