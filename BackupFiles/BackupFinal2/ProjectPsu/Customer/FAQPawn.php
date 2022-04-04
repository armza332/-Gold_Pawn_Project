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
<title>คำถามเกี่ยวกับการจำนำ</title>
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
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="UserLandingPage.php"
                        style="margin-left:15px; color: black;text-decoration: none;">หน้าแรก</a>
                </li>
               
                <li class="breadcrumb-item active" aria-current="page">เกี่ยวกับการขายฝาก</li>
            </ol>
        </nav>





        <!--content-->

        <section id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group list-group-item-action">
                            <!-- แถบด้านซ้าย -->
                                                        
                            <a href="FAQNm.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></span> เรื่องทั่วไป <span class="badge">12</span>
                            </a>
                            <a href="FAQPawn.php" class="list-group-item active main-color-bg">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> เกี่ยวกับการขายฝาก
                            </a>
                            <a href="FAQinterest.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></span> ดอกเบี้ย <span class="badge">12</span>
                            </a>
                            
                            <a href="FAQticket.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></span> ใบสัญญาขายฝาก <span class="badge">12</span>
                            </a>


                        </div>


                    </div>
                    <div class="col-md-9 box ">
                        <!-- Website Overview -->
                        <div class="accordion accordion-flush borderrow" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <p>เกี่ยวกับการขายฝาก</p>
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#flush-collapseOne"
              aria-expanded="false"
              aria-controls="flush-collapseOne"
            >
            <h4>ใครขายฝากได้บ้าง</h4>
            </button>
          </h2>
          <div
            id="flush-collapseOne"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample"
          >
            <div class="accordion-body">บุคคลที่มีอายุตั้งแต่ 15 ปีขึ้นไป มีบัตรประชาชน และไม่เป็นภิกษุ สามเณร</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#flush-collapseTwo"
              aria-expanded="false"
              aria-controls="flush-collapseTwo"
            >
            <h4>การขายฝากต้องใช้อะไรบ้าง</h4>
            </button>
          </h2>
          <div
            id="flush-collapseTwo"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingTwo"
            data-bs-parent="#accordionFlushExample"
          >
            <div class="accordion-body">เตรียมทรัพย์ที่ต้องการนำไปขายฝาก
              <br>- บัตรประชาชน ใบอนุญาตขับรถ หรือพาสปอร์ต              
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#flush-collapseThree"
              aria-expanded="false"
              aria-controls="flush-collapseThree"
            >
            <h4>การขายฝากมีขั้นตอนอย่างไร</h4>
            </button>
          </h2>
          <div
            id="flush-collapseThree"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingThree"
            data-bs-parent="#accordionFlushExample"
          >
            <div class="accordion-body">- เมื่อเข้าไปยังร้านแล้ว จะมีเจ้าหน้าที่ทำการประเมินราคาทรัพย์ที่คุณนำไปขายฝาก และแจ้งราคาของทรัพย์ให้คุณทราบ
              <br>- หากตกลงราคาประเมินแล้ว จะเข้าสู่ขั้นตอนของการกรอกข้อมูลส่วนตัวเพื่อเป็นหลักฐาน
              <br>- ทางร้านมอบใบสัญญาขายฝากให้คุณ พร้อมกับเงินตามจำนวนจากการประเมินทรัพย์
            </div>
          </div>
        </div>        
      </div>
    </div>

                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
    <!-- Footer -->

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
  </body>
</html>
