<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
$dateSelection = $_POST['dateSelection'];//$變數
$dateTime = $_POST['dateTime'];//$變數
$dateTime2 = $_POST['dateTime2'];
$length=$_POST['length'];
$dateMoment=$dateSelection." ".$dateTime;
$dateMoment2=$dateSelection." ".$dateTime2;

$stmt = $conn->prepare("INSERT INTO freetime(length,start,end,doctor_ID)VALUES(?,?,?,?)");
$count = $stmt->execute(array($length, $dateMoment, $dateMoment2,$uid));
if ($count != 1) {
    echo "新增失敗";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=doctorNewDate.php>';
} else {
      echo "新增成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=default2.php>';
}


?>