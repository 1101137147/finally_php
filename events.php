<?php
// liste des événements
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
 $json = array();

 // requête qui récupère les événements
 $requete = "SELECT ft_ID,length,start,end FROM freetime where doctor_id='$uid'";
//  $requete = "SELECT * FROM  freetime";
 
// $servername = 'localhost';
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
 // connexion à la base de données
// try {
// $bdd = new PDO('mysql:host=localhost;dbname=m1105345121', 'root', 'root');
// } catch(Exception $e) {
// exit('imposibledo');
// }
 // exécution de la requête
 $resultat = $conn->query($requete) or die(print_r($conn->errorInfo()));
 
 // envoi du résultat au success
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
 
?>