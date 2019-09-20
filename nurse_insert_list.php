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
    </head>
    <body>
       <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> 
			<span class="icon-bar"></span> <span class="icon-bar"></span> 
			</button>
                    <a href="manager.php" class="navbar-brand" >看診系統</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#about">看診人數查詢</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">醫生管理<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="doctor_select.php">查詢醫生</a></li>
                                <li><a href="doctor_insert_list.php">新增醫生</a></li>
                                <li><a href="#">修改醫生</a></li>
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
        <form class="form-horizontal" action="nurse_insert.php" method="post">
        <h2 class="form-docinsert">新增護士</h2>
        <div class="form-group">
		<label for="name" class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="姓名" required/>
		</div>
		</div>
         <div class="form-group">
		<label for="gender" class="col-sm-2 control-label">性別</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="gender" name="gender" placeholder="性別" required/>
		</div>
		</div>
         <div class="form-group">
		<label for="account" class="col-sm-2 control-label">帳號</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="account" name="account" placeholder="帳號" required/>
		</div>
		</div>
        <div class="form-group">
		<label for="password" class="col-sm-2 control-label">密碼</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="password" name="password" placeholder="密碼" required/>
		</div>
		</div>
        <div class="form-group">
		<label for="email" class="col-sm-2 control-label">信箱</label>
		<div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="信箱" required/>
		</div>
		</div>
        <div class="form-group">
		<label for="tel" class="col-sm-2 control-label">手機</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="tel" name="tel" placeholder="手機" required/>
		</div>
		</div>
        <div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-danger">新增</button>
		</div>
      </form>
    </body>
</html>


