<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
 $msg='';
 $msg2='false';
if (isset($_POST['submit'])) {
     $msg='';
     $search = '';
      if (!empty($_POST['patientid'])) {
          $search.=$_POST['patientid'];
          if($_POST['search'] == "patientid"){
              $search.="='" . $_POST['patientid'] . "'";
          }
      }  
 $stmt = $conn->prepare("SELECT patient_ID,name,gender,tel,address
    FROM patient
    WHERE patient_ID=?");
  $stmt->execute(array($search));
   $msg = ' <table  data-toggle="table" data-url="reservation.php" data-query-params="queryParams" data-height="100">';
  $msg.='<thead><tr><th>身分證字號</th><th>姓名</th><th>性別</th><th>手機</th><th>地址</th></thead><tbody>';
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $msg.="<tr><td>" . $row['patient_ID'] . "</td><td>" . $row['name'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['tel'] . "</td><td>" . $row['address'] . "</td></tr>";
}
if($stmt->rowCount() == 0){
    header("Location:patient_insert_list.php");
    exit();
}


/*
if($stmt->$row<0){
    header("Location:manager.php");
        exit();
}*/
$msg.="</tbody></table>";
 $msg.="<form class='form-horizontal' action='reservation_insert_list.php' method='post'>";
  $msg.="<button type='submit' class='btn btn-success'>預約</button></form>";
    //$row = $stmt->fetch();
}


//       $msg = '<table border="1" style="text-align:center" align="center" >';
//      $msg.='<thead><tr><th>身分證字號</th><th>姓名</th><th>性別</th><th>手機</th><th>地址</th></thead><tbody>';
//foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
//    $msg.="<tr><td>" . $row['patientid'] . "</td><td>" . $row['name'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['tel'] . "</td><td>" . $row['address'] . "</td></tr>";
//}
//$msg.="</tbody></table>";

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <script src="js/jquery-1.11.3.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
           <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
          <script>
 function queryParams() {
   return {
   type: 'owner',
   sort: 'updated',
   direction: 'desc',
   per_page: 100,
   page: 1
   };
   }
   
    function check() {
                var patientid = document.getElementById("patientid").value;
               localStorage.setItem('patientid', patientid);
            }
              </script>
    </head>
    <body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> 
			<span class="icon-bar"></span> <span class="icon-bar"></span> 
			</button>
            <a href="nurse.php" class="navbar-brand" >看診系統-護士</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
<!--               <li><a href="#about">電子病歷</a></li>-->
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">醫生管理<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="doctortime.php">查詢醫生</a></li>
                  <li><a href="reservation.php">預約醫生</a></li>
              </ul>
            </li>
          </ul>
             <ul class="nav navbar-nav navbar-right">
			<li><a href="#"><?php echo "歡迎您　".$username;?></a></li>
			<li><a href="logout.php">登出</a></li>
			</ul>
        </div>
      </div>
    </nav>
        <br> <br> <br>
         <form class="form-horizontal" action="" method="post">
         <div class="form-group">
		<label for="patientid" class="col-sm-2 control-label">身分證字號</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="patientid" name="patientid" placeholder="身分證字號">            
		</div>
              <button type="submit" class="btn btn-danger" onclick="check()" name="submit">查詢</button>
		</div>    
         </form>
                    <?php
                    echo $msg;
                    ?>
    </body>
</html>

