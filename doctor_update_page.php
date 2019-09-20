<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
$userid=$_POST['userid'];
$stmt = $conn->prepare("SELECT User_ID,name,gender,account,password,email,tel,job,status 
FROM user,status,job 
WHERE user.job_ID=job.job_ID
AND status.status_ID=user.status_ID
AND User_ID=?
AND job.job_ID='2'");
$stmt->execute(array($userid));
//$count=$stmt->execute(array($userid));
 $row=$stmt->fetch();
    
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
    </head>
    <body>
       <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> 
			<span class="icon-bar"></span> <span class="icon-bar"></span> 
			</button>
                    <a href="manager.php" class="navbar-brand" >看診系統-管理員</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#about">看診人數查詢</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">醫生管理<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="doctor_select.php">查詢醫生</a></li>
                                <li><a href="doctor_insert_list.php">新增醫生</a></li>
                                <li><a href="doctor_update_list.php.php">修改醫生</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">護士管理<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="nurse_select.php">查詢護士</a></li>
                                <li><a href="nurse_insert_list.php">新增護士</a></li>
                                <li><a href="nurse_update_list.php">修改護士</a></li>
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
        <form class="form-horizontal" action="doctor_update.php" method="post">
        <h2 class="form-docinsert">修改醫生</h2>
        <input class="form-control" type="hidden" id="userid" name="userid" value="<?php echo $row['User_ID']; ?>" >
        <div class="form-group">
		<label for="name" class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" >
		</div>
		</div>
         <div class="form-group">
		<label for="gender" class="col-sm-2 control-label">性別</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $row['gender']; ?>" >
		</div>
		</div>
         <div class="form-group">
		<label for="account" class="col-sm-2 control-label">帳號</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="account" name="account" value="<?php echo $row['account']; ?>" >
		</div>
		</div>
        <div class="form-group">
		<label for="password" class="col-sm-2 control-label">密碼</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" >
		</div>
		</div>
        <div class="form-group">
		<label for="email" class="col-sm-2 control-label">信箱</label>
		<div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email"  value="<?php echo $row['email']; ?>" >
		</div>
		</div>
        <div class="form-group">
		<label for="tel" class="col-sm-2 control-label">手機</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="tel" name="tel"  value="<?php echo $row['tel']; ?>" >
		</div>
		</div>
        <div class="form-group">
		<label for="tel" class="col-sm-2 control-label">職位</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="job" name="job"  value="<?php echo $row['job']; ?>" readonly>
		</div>
		</div>
        <div class="form-group">
		<label for="Status" class="col-sm-2 control-label">狀態</label>
		<div class="col-sm-10">
			<select class="form-control" id="status" name="status"  value="<?php echo $row['status'];?>">
				<option value="1">在職</option>
				<option value="2">離職</option>
			</select>
		</div>
		</div>
        <div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-danger">修改</button>
		</div>
      </form>
    </body>
</html>


