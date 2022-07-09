<?php require $_SERVER["DOCUMENT_ROOT"] . "/ProjectPsu/Employee/Announce/vendor/autoload.php"; ?>
<?php
// $_GET หรือ $_REQUEST ตัวแปรที่รับค่ามาจะเป็นพวกนี้โดนอัตโนมัติ
use App\Model\Pawnform;
$pawnformObj = new Pawnform; //เพิ่มข่าวประชาสัมพันธ์

if($_FILES['upload']['tmp_name']) {

	$ext = end(explode(".", $_FILES['upload']['name'])); //ทำนามสกุล
	$avatar = "/ProjectPsu/Employee/PawnformPicture/" . md5(uniqid()) . ".{$ext}"; //รวมเป็นชื้่อใหม่
	move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$avatar); //ย้ายไปเก็บในโฟลเดอร์ที่ต้องการ

}
if($_REQUEST['action']=='add'){
    $pawnform= $_REQUEST;
	unset($pawnform['action']);
	unset($pawnform['id']);

    $pawnform['picture'] = $avatar;

	
	$pawnformObj->addPawnform($pawnform);
}


 header("location: successpawnform.php");


?>
