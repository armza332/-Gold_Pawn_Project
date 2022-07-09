<?php require $_SERVER["DOCUMENT_ROOT"]."/ProjectPsu/Employee/Announce/vendor/autoload.php";?>
<?php
// $_GET หรือ $_REQUEST ตัวแปรที่รับค่ามาจะเป็นพวกนี้โดนอัตโนมัติ
use App\Model\Announce;
$announceObj = new Announce; //เพิ่มข่าวประชาสัมพันธ์

if($_FILES['upload']['tmp_name']) {
	$ext = end(explode(".", $_FILES['upload']['name'])); //ทำนามสกุล
	$avatar = "/ProjectPsu/Employee/AnnouncePictures/" . md5(uniqid()) . ".{$ext}"; //รวมเป็นชื้่อใหม่
	move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$avatar); //ย้ายไปเก็บในโฟลเดอร์ที่ต้องการ

}
if($_REQUEST['action']=='delete'){
    // เช็คว่ามีรูปไหม?
	$announce = $announceObj->getAllAnnounceById($_REQUEST['id']);
	if($announce['picture']) {
		// ถ้ามีก็ ลบรูปเก่า ด้วย
		unlink($_SERVER['DOCUMENT_ROOT'].$announce['picture']);
	}
	// ลบข้อมูลคนนี้โดยส่ง id ไป
    $announceObj->deleteAnnounce($_REQUEST['id']);

}

elseif($_REQUEST['action']=='edit'){
    $announce = $_REQUEST;
    unset($announce['action']);

    if($_FILES['upload']['tmp_name']) {
		if($announce['picture']){
			// ลบรูปเก่า
			unlink($_SERVER['DOCUMENT_ROOT'].$announce['picture']);
		}
        $announce['picture'] = $avatar;
    }
    $announceObj->updateAnnounce($announce);


}
elseif($_REQUEST['action']=='add'){
    $announce = $_REQUEST;
	unset($announce['action']);
	unset($announce['id']);

    $announce['picture'] = $avatar;

	
	$announceObj->addAnnounce($announce);
}


header("location: AddAnnounce.php");

?>
