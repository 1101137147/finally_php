<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
$patientid=$_POST['patientid'];
$stmt = $conn->prepare("SELECT reservation.patient_ID,name,gender,res_date,res_time
FROM patient,reservation
where reservation.patient_ID=patient.patient_ID
AND reservation.patient_ID=?
AND reservation.doctor_ID='".$uid."'");
$stmt->execute(array($patientid));
//$count=$stmt->execute(array($userid));
 $row=$stmt->fetch();
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap2.css" rel="stylesheet">
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <script src="js/jquery-1.11.3.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
              <script src="js/bootstrap-datetimepicker.min.js"></script>
         <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
           <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
        <script>
            
    $(function() {
    $('#datetimepicker').datetimepicker({
      pickDate:true,
       pickSeconds:false,
    });
  }); 
      
    $(function() {
    $('#datetimepicker2').datetimepicker({
      pickDate:true,
       pickSeconds:false,
    });
  }); 
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
                <li><a href="#">看診人數查詢</a></li>
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
        <form class="form-horizontal" action="diagnosis_insert.php" method="post">
        <h2 class="form-docinsert">電子病歷</h2>
          <div class="form-group">
         	<label for="patientid" class="col-sm-2 control-label">身份證字號</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="patientid" name="patientid" value="<?php echo $row['patient_ID']; ?>" readonly>
		</div>
		</div>
        
         <div class="form-group">
		<label for="name" class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" readonly>
		</div>
		</div>
        
      <div class="form-group">
		<label for="gender" class="col-sm-2 control-label">性別</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $row['gender']; ?>" readonly>
		</div>
		</div>
        <div class="form-group">
		<label for="diagndate" class="col-sm-2 control-label">看診日期</label>
		<div class="col-sm-10">
                    <input type="text" class="form-control" id="diagndate" name="diagndate" placeholder="看診日期" value="<?php echo date("Y-m-d") ?>" readonly/>
		</div>
		</div>
           <div class="form-group">
		<label for="Symptoms" class="col-sm-2 control-label">症狀</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="Symptoms" name="Symptoms" placeholder="症狀" required/>
		</div>
		</div>
        <div class="form-group">
		<label for="elsesick" class="col-sm-2 control-label">其他症狀</label>
		<div class="col-sm-10">
                    <textarea class="form-control"  rows="5" id="elsesick" name="elsesick" placeholder="其他症狀" ></textarea>
		</div>
		</div>
        <div class="form-group">
		<label for="suggest" class="col-sm-2 control-label">建議</label>
		<div class="col-sm-10">
                    <textarea class="form-control"  rows="5" id="suggest" name="suggest" placeholder="建議"></textarea>
		</div>
		</div>
      
	
                  
        <div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-danger">新增</button>
		</div>
      </form>
    </body>
</html>


