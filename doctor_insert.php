<?php

include './db.php';
header("Content-Type:text/html; charset=utf-8");
$name = $_POST['name'];
$gender = $_POST['gender'];
$account = $_POST['account'];
$password = $_POST['password'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$stmt = $conn->prepare("INSERT INTO user(name,gender,account,password,email,tel,job_ID,status_ID)VALUES(?,?,?,?,?,?,?,?)");
$count = $stmt->execute(array($name, $gender, $account, $password, $email, $tel, '2', '1'));
if ($count != 1) {
    echo "新增失敗";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=doctor_insert_list.php>';
} else {
      echo "新增成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=doctor_select.php>';
}
//header("Location:manager.php");
?>
