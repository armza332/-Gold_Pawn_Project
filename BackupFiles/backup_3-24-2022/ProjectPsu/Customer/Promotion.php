<?php require $_SERVER["DOCUMENT_ROOT"]."/ProjectPsu/Employee/Announce/vendor/autoload.php";?>
<?php
error_reporting(error_reporting() & ~E_NOTICE);
use App\Model\Promotion;
?>


<!DOCTYPE html>
<html>
<title>โปรโมชั่น</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pridi" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
  integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="CSSgoldpawn.css" />
<style>
    .pic{
        width: 100%;
        
    }

</style>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark navcolor">
    <div class="container-xl">
      <img src="img/ห้างทองแสงสุวรรณ3.png" class="navbar-brand logo" style="width: 25% ; margin-right: 40px;"
        href="landingpageTest.html">
      <button class="navbar-toggler buttonCl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon my-toggler"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="landingpageTest.html">หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AboutUs.html">เกี่ยวกับเรา</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              คำถามที่พบบ่อย
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="FAQNm.html">เรื่องทั่วไป</a>
              </li>
              <li>
                <a class="dropdown-item" href="FAQPawn.html"
                  >เกี่ยวกับการจำนำ</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="FAQinterest.html">ดอกเบี้ย</a>
              </li>
              <li>
                <a class="dropdown-item" href="FAQticket.html">ตั๋วจำนำ</a>
              </li>
              <li><a class="dropdown-item" href="#">สอบถามเพิ่มเติม</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="calculate.html">คำนวนดอกเบี้ย</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.html">ติดต่อเรา</a>
          </li>
        </ul>
        <span class="navbar-text">
          <form class="container-fluid justify-content-end">
            <a class="btn btn-outline-light me-2 blg" type="button" href="login.html">
              <i class="fas fa-user-alt"></i> เข้าสู่ระบบ
            </a>
          </form>
        </span>
      </div>
    </div>
  </nav>
<
  <div>
    <!-- Head -->
    <div class="container-lg" style="max-width: 1100px; margin-top: 130px; margin-bottom: 80px">
      <nav
        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="landingpageTest.html">หน้าแรก</a></li>
          <li class="breadcrumb-item active" aria-current="page">ข่าวโปรโมชั่น</li>
        </ol>
      </nav>
      <!-- Content -->
      <!-- Banner -->
      <div>
        <img src="img/Prom.png" style="width: 100%; margin-bottom: 80px" />
      </div>
     
      <!-- Promotion -->
      <div class='borderrow'>
            
      
        <?php
            $promotionObj = new Promotion();
                                            
            $promotions = $promotionObj->getAllPromotion($filters);
            $n=0;
        
                                            
            foreach($promotions as $promotion ){
                $n++;                                    
            echo "
            
              <div class='border row mb-4 '>
                
                  <div class='col'>
                      <img src='{$promotion['picture']}' class='pic rounded-2'>
                  </div>
                  <div class='col mt-2 text-break'>
                      <h2 class='mb-4'>{$promotion["header"]}</h2>
                      <div class='col'>
                          <a href='PromotionContent.php?id={$promotion['id']}&action=content' class='btn btn-danger mt-5 float-end'>อ่านเพิ่มเติม</a>
                      </div>
                  </div>
              </div> 
                                        
            ";
        }

        ?>
            
    </div> 
  </div>
  </div>
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