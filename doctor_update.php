<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
$userid=$_POST['userid'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$account = $_POST['account'];
$password = $_POST['password'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$job= $_POST['job'];
$status=$_POST['status'];
$stmt = $conn->prepare("UPDATE user set name=?,gender=?,account=?,password=?,email=?,tel=?,job_ID=?,status_ID=? where User_ID=?");
//$res = $db->prepare("UPDATE member set name=?,address=?,birth=?,MobilePhone=?,phone=?,email=?  where id=? ");
$count = $stmt->execute(array($name, $gender, $account, $password, $email, $tel, '2', $status,$userid));
if ($count != 1) {
    echo "修改失敗";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=doctor_update_list.php>';
} else {
      echo "修改成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=doctor_select.php>';
}

?>
