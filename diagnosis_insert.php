<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
$patientid = $_POST['patientid'];
$diagndate = $_POST['diagndate'];
$Symptoms = $_POST['Symptoms'];
$elsesick = $_POST['elsesick'];
$suggest = $_POST['suggest'];

$stmt = $conn->prepare("INSERT INTO diagnosis(diagnosis_date,Symptoms,elsesick,suggest,doctor_ID,patient_ID)VALUES(?,?,?,?,?,?)");
$count = $stmt->execute(array($diagndate,$Symptoms,$elsesick,$suggest,$uid,$patientid));
if ($count != 1) {
    echo "新增失敗";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=diagnosis_list.php>';
} else {
      echo "新增成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=diagnosis_list.php>';
}

?>
