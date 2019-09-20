<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
$stmt2 = $conn->prepare("SELECT User_ID,name,job,status,start,end,NOW()
From user,status,job,freetime
WHERE user.job_ID=job.job_ID
AND status.status_ID=user.status_ID
AND user.user_ID=freetime.doctor_ID
And start <= NOW()
And end >=NOW()
AND job.job_ID='2'
AND status.status_ID='1'");
$stmt2->execute();
$res2 = '';
foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $res2.='<option value="' . $row['User_ID'] . '">' . $row['name'] . '</option>';
}
//
//$stmt = $conn->prepare("SELECT User_ID,name,job,status
//From user,status,job 
//WHERE user.job_ID=job.job_ID
//AND status.status_ID=user.status_ID
//AND job.job_ID='3'
//AND status.status_ID='1'");
//$stmt->execute();
//$res = '';
//foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row2) {
//    $res.='<option value="' . $row2['User_ID'] . '">' . $row2['name'] . '</option>';
//}

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
            var res = window.localStorage.getItem("patientid");
            $(document).ready(function(){
                $("#patientid").val(res);
            });
    $(function() {
    $('#datetimepicker').datetimepicker({
      pickDate:false,
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
          <form class="form-horizontal" action="reservation_insert.php" method="post">
        <h2 class="form-docinsert">預約</h2>
         <div class="form-group">
		<label for="resdate" class="col-sm-2 control-label">預約日期</label>
		<div class="col-sm-10">
                    <input type="text" class="form-control" id="resdate" name="resdate" placeholder="預約日期" value="<?php echo date("Y-m-d") ?>" readonly/>
		</div>
		</div>
<!--         <div class="form-group">
		<label for="restime" class="col-sm-2 control-label">預約時間</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="restime" name="restime" placeholder="預約時間" required/>
		</div>
		</div>-->
        <div class="form-group">
		<label for="restime" class="col-sm-2 control-label">預約時間</label>
		<div id="datetimepicker" class="input-append col-sm-5 ">
                    <input type="text" data-format="hh:mm"  class="form-control" id="restime"   name="restime" placeholder="預約時間" required/>
                        <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                </div>  
		</div>
        <div class="form-group">
		<label for="doctor" class="col-sm-2 control-label">醫生</label>
		<div class="col-sm-10">
			<select class="form-control" id="doctor" name="doctor" required/>
				<?php echo $res2; ?>
			</select>
		</div>
		</div>
<!--         <div class="form-group">
		<label for="nurse" class="col-sm-2 control-label">護士</label>
		<div class="col-sm-10">
			<select class="form-control" id="nurse" name="nurse" required/>
				
			</select>
		</div>
		</div>-->
<!--               <div class="form-group">
		<label for="nurse" class="col-sm-2 control-label">護士</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="nurse" name="nurse" value="">
		</div>
		</div>-->
        <div class="form-group">
		<label for="patientid" class="col-sm-2 control-label">身分證字號</label>
		<div class="col-sm-10">
                    <input type="text" class="form-control" id="patientid" name="patientid" placeholder="身分證字號" readonly/>
		</div>
		</div>
        <div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-danger">新增</button>
		</div>
          </form>
    </body>
</html>



