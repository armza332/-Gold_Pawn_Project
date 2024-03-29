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
<title>คำนวณดอกเบี้ย</title>
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
    }
    ?>
  </div>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark navcolor">
    <div class="container-fluid me-4">
    <a href="UserlandingPage.php" class="navbar-brand me-auto logo ms-5 mb-2" style="width: 40%"
			>	<img src="img/ห้างทองแสงสุวรรณ5.png" style="width: 40%" /></a>
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
              <li><a class="dropdown-item" href="Announce.php">ข่าวสารประชาสัมพันธ์</a></li>
              <li>
                <a class="dropdown-item" href="Promotion.php">ข่าวสารโปรโมชั่น</a>
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
              <a class="btn btn-outline-light me-3 blg " id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <li class="breadcrumb-item">
          <a href="UserLandingPage.php">หน้าแรก</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          คำนวณดอกเบี้ย
        </li>
      </ol>
    </nav>
    <!-- Content -->
    <div class="row align-items borderrow">
      <div class="col">
        <h3 class="text-center" style="color: brown;">ห้างทองแสงสุวรรณ คำนวณดอกเบี้ยเองได้</h3>
        <h6 class="w-auto">ให้คุณสามารถคำนวณดอกเบี้ยการรับจำนำของเราได้ตลอดเวลา
          ใช้งานง่าย เพียงกรอกข้อมูลเงินต้น และระยะเวลาการผ่อนชำระ
          ช่วยให้คุณได้อัตราดอกเบี้ยที่คุณต้องจ่ายได้อย่างรวดเร็ว</h6><br><br>
        <h3 class="text-center">วิธีคำนวณดอกเบี้ย ห้างทองแสงสุวรรณ</h3>
        - ลูกค้าสามารถเพิ่ม หรือผ่อน เงินต้นได้ <br>
        - ตั๋วจำนำมีอายุ 5 เดือน 30 วัน ลูกค้าสามารถจ่ายดอกเบี้ยหรือไถ่ถอนก่อนครบกำหนดได้ <br>
        - สินเชื่อมีระยะเวลาการชำระขั้นต่ำ 15 วัน สูงสุด 5 เดือน 30 วัน <br>
        - หากไม่มีการทำธุรกรรมภายในระยะเวลาที่กำหนด ทรัพย์สินจะหลุดจำนำ
      </div>
      <div class="col" style="text-align:center">
        <div class="headcal">
          <h3 style="color: brown;">คำนวณดอกเบี้ย</h3>
        </div>
        
        <div class="row ">
          
          <div class="col  " style="background-color:rgb(233, 233, 233);">
            <h4 class="mt-2">กรอกเงินต้นของคุณ</h4><br>
            <div class="row">
              <div class="col-10">
                <input class="form-control" type="text" id="principle">
              </div>
              <div class="col-2">
                <p>บาท</p>
              </div>
            </div>
            <br>
            ดอกเบี้ยค้างชำระ
            <br>
          </div>
          <div class="col" style="background-color:rgb(230, 225, 225);">
            <h4 class="mt-2">ระยะเวลาผ่อนชำระ</h4><br>
            <div class="row">
              <div class="col-10">
                <form>
                  <select class="form-select" id="month">
                    <option id="month">1 </option>
                    <option id="month">2</option>
                    <option id="month">3</option>
                    <option id="month">4</option>
                    <option id="month">5</option>
                    <option id="month">6</option>
                  </select>
                </form>
              </div>
              <div class="col-2">
                <p>เดือน</p>
              </div>
            </div>
            <br>
            <div class="container">
              <div class="row">
                <div class="col-6 d-flex flex-row-reverse">
                  <p id="interest">0</p>
                </div>
                <div class="col-4">บาท</div>
              </div>
            </div>
          </div>
          <div class="mt-3 d-grid gap-3 d-md-flex justify-content-md-end">
            <button onclick="myFunction()" class="btn btn-danger">คำนวนดอกเบี้ย</button>
          </div>          
          <script>
            function myFunction() {
              num1 = document.getElementById("principle").value;
              num2 = document.getElementById("month").value;
              document.getElementById("interest").innerHTML = (num1 * num2) * 3 / 100;
            }
          </script>
        </div>
      </div>
    </div>


  </div>
  </div>


  <!-- Footer -->


  <footer class="w3-container w3-padding-32 w3-center footerCL">
    <li>Copyright © 2021 ห้างทองแสงสุวรรณ All Rights Reserved.</li>
  </footer>

  <script src="js/bootstrap.min.js">
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
</body>

</html>