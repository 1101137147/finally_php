<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
$resdate = $_POST['resdate'];
$restime=$_POST['restime'];
$doctor = $_POST['doctor'];
//$nurse = $_POST['nurse'];
$patientid= $_POST['patientid'];
$stmt = $conn->prepare("INSERT INTO reservation(res_date,res_time,doctor_ID,nurse_ID,patient_ID)VALUES(?,?,?,?,?)");
$count = $stmt->execute(array($resdate,$restime, $doctor, $uid, $patientid));
if ($count != 1) {
    echo "新增失敗";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=reservation_insert_list.php>';
} else {
      echo "新增成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=nurse.php>';
}
//header("Location:manager.php");
?>
