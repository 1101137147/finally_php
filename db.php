<?php
//$servername = 'localhost';
//$username = 'root';
//$password = 'root';
//$dbname = 'finally';
$servername = "db.mis.kuas.edu.tw";
$username = "m1105345121";
$password = "a050115";
$dbname = "m1105345121";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->exec("set name utf8");
   // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
//$conn = null;
?>