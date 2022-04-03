<?php require $_SERVER["DOCUMENT_ROOT"]."/ProjectPsu/Employee/Announce/vendor/autoload.php";?>
<?php
// $_GET หรือ $_REQUEST ตัวแปรที่รับค่ามาจะเป็นพวกนี้โดนอัตโนมัติ
use App\Model\User;
$userObj = new User; //เพิ่มข่าวประชาสัมพันธ์




if($_REQUEST['action']=='delete'){
    // เช็คว่ามีรูปไหม?
	
	// ลบข้อมูลคนนี้โดยส่ง id ไป
    $userObj->deleteUser($_REQUEST['id']);

}

elseif($_REQUEST['action']=='edit'){
    $usersgp = $_REQUEST;
    unset($usersgp['action']);

    $userObj->updateUser($usersgp);


}elseif($_REQUEST['action']=='add'){
    $usersgp = $_REQUEST;
	unset($usersgp['action']);
	unset($usersgp['id']);

    

	
	$userObj->addUser($usersgp);
}


header("location: dashboardUser.php");

?>
