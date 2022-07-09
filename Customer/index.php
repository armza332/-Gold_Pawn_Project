
<!DOCTYPE html>
<html>
  <title>ห้างทองแสงสุวรรณ</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pridi"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
    crossorigin="anonymous"/>
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
    <div class="container-fluid me-4">
    <a href="index.php" class="navbar-brand me-auto logo ms-5 mb-2" style="width: 40%"
			>	<img src="img/ห้างทองแสงสุวรรณ5.png" style="width: 40%" /></a>
      <button class="navbar-toggler buttonCl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon my-toggler"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="NLAboutUs.php">เกี่ยวกับเรา</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ข่าวสาร
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="NLAnnounce.php">ข่าวสารประชาสัมพันธ์</a></li>
              <li>
                <a class="dropdown-item" href="NLPromotion.php">ข่าวโปรโมชั่น</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              คำถามที่พบบ่อย
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="NLFAQNm.php">เรื่องทั่วไป</a>
              </li>
              <li>
                <a class="dropdown-item" href="NLFAQPawn.php">เกี่ยวกับการจำนำ</a>
              </li>
              <li>
                <a class="dropdown-item" href="NLFAQinterest.php">ดอกเบี้ย</a>
              </li>
              <li>
                <a class="dropdown-item" href="NLFAQticket.php">ตั๋วจำนำ</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="NLcalculate.php">คำนวนดอกเบี้ย</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="NLcontactus.php">ติดต่อเรา</a>
          </li>
        </ul class="justify-content-end">
        <span class="navbar-text">
            <form class="container-fluid justify-content-end me-3 ms-5">
              <a
                class="btn btn-outline-light blg"
                type="button"
                href="login.php"
              >
                <i class="fas fa-user-alt"></i> เข้าสู่ระบบ
              </a>
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
        style="
          --bs-breadcrumb-divider: url(
            &#34;data:image/svg + xml,
            %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='currentColor'/%3E%3C/svg%3E&#34;
          );
        "
        aria-label="breadcrumb"
      >
        <ol class="breadcrumb">
          <li
            class="breadcrumb-item active"
            aria-current="page"
            style="margin-left: 15px"
          >
            หน้าแรก
          </li>
        </ol>
      </nav>
      <!-- Content -->
      <!-- Slideshow -->
      <div class="w3-container">
        <div class="w3-display-container mySlides">
          <img src="img/banner landing page.png" style="width: 100%" /> 
        </div>
        <div class="w3-display-container mySlides">
          <img
            src="img/gold1.png"
            style="width: 100%"
          />
        </div>
        <div class="w3-display-container mySlides">
          <img
            src="img/banner landing page3.png"
            style="width: 100%"
          />
          <div class="w3-display-topright w3-container w3-padding-32">
            <span class="w3-white w3-padding-large w3-animate-bottom"
              >ดูรายละเอียดเพิ่มเติม</span
            >
          </div>
        </div>

        <!-- Slideshow next/previous buttons -->
        <div class="w3-container w3-white w3-padding w3-xlarge">
          <div class="w3-left" onclick="plusDivs(-1)">
            <i class="fa fa-arrow-circle-left w3-hover-text-teal"></i>
          </div>
          <div class="w3-right" onclick="plusDivs(1)">
            <i class="fa fa-arrow-circle-right w3-hover-text-teal"></i>
          </div>

          <div class="w3-center">
            <span
              class="
                w3-tag
                demodots
                w3-border w3-transparent w3-hover-dark-grey
              "
              onclick="currentDiv(1)"
            ></span>
            <span
              class="
                w3-tag
                demodots
                w3-border w3-transparent w3-hover-dark-grey
              "
              onclick="currentDiv(2)"
            ></span>
            <span
              class="
                w3-tag
                demodots
                w3-border w3-transparent w3-hover-dark-grey
              "
              onclick="currentDiv(3)"
            ></span>
          </div>
        </div>
      </div>

      <!-- Grid -->
      <div class="w3-row w3-container">
      <div class="w3-center w3-padding-64">
        <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">ข่าวสารประชาสัมพันธ์</span>
      </div>
      <div class="row align-items borderrow">
        <div class="col">
          <a href="NLAnnounceContent.php?id=7&action=content"><img src="img/ข่าว50ปี.png" style="width: 100%" /></a>
        </div>
        <div class="col">
          <a href="NLAnnounceContent.php?id=8&action=content"><img src="img/ข่าวเหลือง.jpg" style="width: 100%" /></a>
        </div>
      </div>
    </div>

    <div class="w3-row w3-container">
      <div class="w3-center w3-padding-64">
        <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">ข่าวสารโปรโมชั่น</span>
      </div>
      <div class="row align-items borderrow">
        <div class="col">
          <a href="NLPromotionContent.php?id=11&action=content"><img src="img/pro7.png" style="width: 100%" /></a>
        </div>
        <div class="col">
          <a href="NLPromotionContent.php?id=6&action=content"><img src="img/pro5.png" style="width: 100%" /></a>
        </div>
      </div>
    </div>
  </div>

    <!-- Grid -->

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
          dots[i].className = dots[i].className.replace(" w3-dark-grey", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-dark-grey";
      }
    </script>
  </body>
</html>
