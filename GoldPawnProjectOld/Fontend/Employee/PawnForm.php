<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>Registration System PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="css/main.css" rel="stylesheet" media="all">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/opensans-font.css">
    <link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
            <img src="ห้างทองแสงสุวรรณ3.png" class="navbar-brand logo" style="width: 25%; margin-right: 40px" href="landingpageTest.html" />
            <button class="navbar-toggler buttonCl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon my-toggler"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="LandingPageEmployee.html">หน้าแรก</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ทำรายการ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="PawnForm.html">ขายฝาก</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="Retunform.html">ไถ่ถอน</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="Increase_Principal.html">เพิ่มเงินต้น</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="principal_pay.html">ตัดต้น</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="continueform.html">ต่อดอกเบี้ย</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="CusForm.html">สมัครสมาชิกลูกค้า</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            จัดการข่าวสาร
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="Announce.html">ข่าวประชาสัมพันธ์</a></li>
                            <li>
                                <a class="dropdown-item" href="Promotion.html">ข่าวโปรโมชั่น</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.html">รายงานสรุปผล </a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <form class="container-fluid justify-content-end">
                        <a class="btn btn-outline-light me-2 blg" type="button" href="#">
                            <i class="fas fa-user-alt"></i> ศิวกร วงศ์ชัยศรี
                        </a>
                    </form>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-lg" style="max-width: 1100px; margin-top: 100px; margin-bottom: 0px ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="LandingPageEmployee.html" style="margin-left:15px; color: black;text-decoration: none;">หน้าแรก</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">สมัครสมาชิกลูกค้า</li>
            </ol>
        </nav>
    </div>
    <div class="page-wrapper  p-t-50 p-b-50 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <div class="container">
                        <h3 class=" title">สมัครสมาชิก</h3>
                        <form action="CusForm_db.php" method="post">
                            <?php if (isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['warning'])) { ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php
                                    echo $_SESSION['warning'];
                                    unset($_SESSION['warning']);
                                    ?>
                                </div>
                            <?php } ?>
                            <div class="row row-space">
                                <div class="col-2 mb-2">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="title">
                                            <option disabled="disabled" selected="selected">Title</option>
                                            <option>MR.</option>
                                            <option>MS.</option>
                                            <option>MRS.</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                    
                                </div>

                            </div>

                            <div class="input-group">
                                <input type="text" class="input--style-2" name="firstname" aria-describedby="firstname" placeholder="Firstname">
                            </div>
                            <div class="input-group">
                                <input type="text" class="input--style-2 " name="lastname" aria-describedby="lastname" placeholder="Lastname">
                            </div>
                            <div class="input-group">
                                <input type="email" class="input--style-2 " name="email" aria-describedby="email" placeholder="Email">
                            </div>
                            <div class="input-group">
                                <input type="text" class="input--style-2 " name="phonenumber" aria-describedby="phonenumber" placeholder="Phone number">
                            </div>
                            <div class="input-group">
                                <input type="text" class="input--style-2 " name="address" aria-describedby="address" placeholder="Address">
                            </div>
                            <div class="input-group">
                                <input type="text" class="input--style-2 " name="idcard" aria-describedby="idcard" placeholder="ID card">
                            </div>
                            <div class="input-group">
                                <input type="date" class="input--style-2 " name="birthday" aria-describedby="birthday" placeholder="Birthday" style="padding : 9px 0">
                            </div>
                            
                            <hr>
                            <div class="input-group">
                                <input type="password" class="input--style-2 " name="password" aria-describedby="password" placeholder="Password">
                            </div>
                            <div class="input-group">
                                <input type="password" class="input--style-2 " name="c_password" aria-describedby="c_password" placeholder="Comfirm Password">
                            </div>

                            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <footer class="w3-container w3-padding-32 w3-center footerCL mt-4">
            <li>Copyright © 2021 ห้างทองแสงสุวรรณ All Rights Reserved.</li>
        </footer>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>
        <script src="js/global.js"></script>

</body>

</html>