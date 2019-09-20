<?php

include './db.php';
header("Content-Type:text/html; charset=utf-8");
$patientid = $_POST['patientid'];
$name=$_POST['name'];
$gender = $_POST['gender'];
$tel = $_POST['tel'];
$address= $_POST['address'];
$stmt = $conn->prepare("INSERT INTO patient(patient_ID,name,gender,tel,address)VALUES(?,?,?,?,?)");
$count = $stmt->execute(array($patientid,$name, $gender, $tel, $address));
if ($count != 1) {
    echo "新增失敗";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=patient_insert_list.php>';
} else {
      echo "新增成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=nurse.php>';
}
//header("Location:manager.php");
?>
