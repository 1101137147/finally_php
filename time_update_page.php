<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
$ftid=$_POST['ftid'];
$stmt = $conn->prepare("SELECT ft_ID,start,end,length
From freetime
WHERE ft_ID=?
AND doctor_ID='".$uid."'");
$stmt->execute(array($ftid));
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
             function check() {
                    var num1 = $("#start").val();
                    var num2 = $("#end").val();
                    if ((num1 !== '') && (num2 !== '')) {
                        if (num1 > num2) {
                            alert("開始日期不能大於結束日期");
                            return false;
                        }
                    } else {
                        alert("請選擇日期");
                         return false;
                    }
                    return true;
                };
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
        <form class="form-horizontal" action="time_update.php" method="post" onsubmit="return check()">
        <h2 class="form-docinsert">修改看診時段</h2>
        <input class="form-control" type="hidden" id="ftid" name="ftid" value="<?php echo $row['ft_ID']; ?>" >
        
        <div class="form-group">
		<label for="start" class="col-sm-2 control-label">開始時間</label>
		<div id="datetimepicker" class="input-append  col-sm-5 date ">
                    <input type="text" data-format="yyyy-MM-dd hh:mm"  class="form-control" id="start"   name="start"  value="<?php echo $row['start']; ?>">
                        <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                </div>  
		</div>
         <div class="form-group">
		<label for="end" class="col-sm-2 control-label">結束時間</label>
		<div id="datetimepicker2" class="input-append  col-sm-5 date ">
                    <input type="text" data-format="yyyy-MM-dd hh:mm"  class="form-control" id="end"   name="end"  value="<?php echo $row['end']; ?>">
                        <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                </div>  
		</div>
          <div class="form-group">
		<label for="length" class="col-sm-2 control-label">看診時長(分鐘)</label>
		<div  id="datetimepicker" class="input-append col-sm-5">
			<input type="number" step="10" min="10" max="60"  class="form-control" id="length" name="length" value="<?php echo $row['length']; ?>">
		</div>
		</div>
                  
        <div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-danger">修改</button>
		</div>
      </form>
    </body>
</html>


