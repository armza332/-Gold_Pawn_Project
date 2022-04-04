<?php require $_SERVER["DOCUMENT_ROOT"]."/ProjectPsu/Employee/Announce/vendor/autoload.php";?>
<?php
// $_GET หรือ $_REQUEST ตัวแปรที่รับค่ามาจะเป็นพวกนี้โดนอัตโนมัติ
use App\Model\Promotion;
$promotionObj = new Promotion; //เพิ่มข่าวประชาสัมพันธ์

if($_FILES['upload']['tmp_name']) {
	$ext = end(explode(".", $_FILES['upload']['name'])); //ทำนามสกุล
	$avatar = "/ProjectPsu/Employee/PromotionPictures/" . md5(uniqid()) . ".{$ext}"; //รวมเป็นชื้่อใหม่
	move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$avatar); //ย้ายไปเก็บในโฟลเดอร์ที่ต้องการ

}
if($_REQUEST['action']=='delete'){
    // เช็คว่ามีรูปไหม?
	$promotion = $promotionObj->getAllPromotionById($_REQUEST['id']);
	if($promotion['picture']) {
		// ถ้ามีก็ ลบรูปเก่า ด้วย
		unlink($_SERVER['DOCUMENT_ROOT'].$promotion['picture']);
	}
	// ลบข้อมูลคนนี้โดยส่ง id ไป
    $promotionObj->deletePromotion($_REQUEST['id']);

}

elseif($_REQUEST['action']=='edit'){
    $promotion = $_REQUEST;
    unset($promotion['action']);

    if($_FILES['upload']['tmp_name']) {
		if($promotion['picture']){
			// ลบรูปเก่า
			unlink($_SERVER['DOCUMENT_ROOT'].$promotion['picture']);
		}
        $promotion['picture'] = $avatar;
    }
    $promotionObj->updatePromotion($promotion);


}
elseif($_REQUEST['action']=='add'){
    $promotion = $_REQUEST;
	unset($promotion['action']);
	unset($promotion['id']);

    $promotion['picture'] = $avatar;

	
	$promotionObj->addPromotion($promotion);
}


header("location: AddPromotion.php");

?>
