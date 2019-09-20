<?php
//include './check.php';
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
         <script src="js/jquery-1.11.3.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> 
			<span class="icon-bar"></span> <span class="icon-bar"></span> 
			</button>
            <a class="navbar-brand" >看診系統-護士</a>
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
         <br><br><br>
         <div class="container">                 
             <img src="img/nurse.png" class="img-responsive" style="float:left;margin:0 20% 20px" alt="Cinque Terre" width="650"> 
</div>
    </body>
</html>

