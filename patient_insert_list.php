<?php
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href='css/footable.bootstrap.min.css' rel='stylesheet' />
        <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <script type="text/javascript" src="js/datatables.min.js"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src='js/footable.min.js'></script>
        <script>
            
            var res = window.localStorage.getItem("patientid");
            $(document).ready(function(){
                $("#patientid").val(res);
            })
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
        </br></br></br>
        <form class="form-horizontal" action="patient_insert.php" method="post">
        <h2 class="form-docinsert">新增病人基本基料</h2>
        <div class="form-group">
		<label for="patientid" class="col-sm-2 control-label">身分證字號</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="patientid" name="patientid" placeholder="身分證字號" required/>
		</div>
		</div>
         <div class="form-group">
		<label for="name" class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="姓名" required/>
		</div>
		</div>
          <div class="form-group">
		<label for="gender" class="col-sm-2 control-label">性別</label>
		<div class="col-sm-10">
			<select class="form-control" id="gender" name="gender" required/>
				<option value="男">男</option>
				<option value="女">女</option>
			</select>
		</div>
		</div>
        <div class="form-group">
		<label for="tel" class="col-sm-2 control-label">手機</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="tel" name="tel" placeholder="手機" required/>
		</div>
		</div>
        <div class="form-group">
		<label for="address" class="col-sm-2 control-label">地址</label>
		<div class="col-sm-10">
                    <input type="text" class="form-control" id="address" name="address" placeholder="地址" required/>
		</div>
		</div>
        <div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-danger">新增</button>
		</div>
      </form>
    </body>
</html>


