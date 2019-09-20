<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
$ftid=$_POST['ftid'];
$start = $_POST['start'];
$end = $_POST['end'];
$length = $_POST['length'];
$stmt = $conn->prepare("UPDATE freetime set start=?,end=?,length=? where ft_ID=?");
//$res = $db->prepare("UPDATE member set name=?,address=?,birth=?,MobilePhone=?,phone=?,email=?  where id=? ");
$count = $stmt->execute(array($start, $end, $length,$ftid));
if ($count != 1) {
    echo "修改失敗";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=time_update_list.php>';
} else {
      echo "修改成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=default2.php>';
}

?>
