<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$msg="";
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
$stmt = $conn->query("SELECT reservation.patient_ID,name,gender,res_date,res_time,CURDATE()
FROM patient,reservation
where reservation.patient_ID=patient.patient_ID
And res_date=CURDATE()
AND reservation.doctor_ID='".$uid."'");
$msg.='<thead><tr><th>身份證字號</th><th>性別</th><th>性別</th><th>預約日期</th><th>預約時間</th><th></th></thead><tbody>';
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $msg.="<tr><td>" . $row['patient_ID'] . "</td><td>" . $row['name'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['res_date'] . "</td><td>" . $row['res_time'] . "</td><td><form action='diagnosis_insert_page.php' method='POST'><input type='hidden' name='patientid' value=".$row['patient_ID'].">
    <button type='submit' class='btn btn-success'>看診</button></form></td></tr>";
}
$msg.="</tbody>";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href='css/footable.bootstrap.min.css' rel='stylesheet' />
        <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
        <script type="text/javascript" src="js/datatables.min.js"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src='js/footable.min.js'></script>

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
            <a href="doctor.php" class="navbar-brand" >看診系統-醫生</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li><a href="diagnosis_list.php">電子病歷</a></li>
             <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              醫生管理<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="count.php">看診人數查詢</a></li>
                <li><a href="default2.php">查詢看診時間</a></li>
                <li><a href="doctorNewDate.php">設定看診時間</a></li>
                <li><a href="time_update_list.php">修改看診時間</a></li>
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
        </br></br></br>
<!--        <table  class="table" data-filtering="true" data-paging="true">         
            
        </table>-->
      
        <table  data-toggle="table"
                data-url="diagnosis_list.php"
                data-query-params="queryParams"
                data-pagination="true"
                data-search="true"
                data-height="500"
                data-show-refresh="true"
                data-show-toggle="true"
                data-show-columns="true">
                    <?php
                    echo $msg;
                    ?>
        </table>

    </body>
</html>

