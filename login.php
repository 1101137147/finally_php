<?php
include './db.php';
session_start();
header("Content-Type:text/html; charset=utf-8");
$msg2='false';
if (isset($_POST['account'])) {
    $account=$_POST['account'];
    $password=$_POST['password'];
    $stmt = $conn->prepare("SELECT user_ID,name,account,password,job,status
    FROM user,job,status
    WHERE user.Job_ID=job.Job_ID
    AND status.status_ID=user.status_ID
    AND account=?
    AND password=?
    And user.status_ID='1'");
    $stmt->execute(array($account,$password));
    $row = $stmt->fetch();
    $_SESSION['user_ID'] = $row['user_ID'];
    $_SESSION['name'] = $row['name'];
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
    if($row['job']=='管理員'){
  $stmt = $conn->prepare("INSERT INTO sign_in(signdate,signtime,user_ID)VALUES(CURDATE(),CURTIME(),?)");
  $count = $stmt->execute(array($uid));
    header("Location:manager.php");
      exit();
    }else if($row['job']=='醫生'){
  $stmt = $conn->prepare("INSERT INTO sign_in(signdate,signtime,user_ID)VALUES(CURDATE(),CURTIME(),?)");
  $count = $stmt->execute(array($uid));
       header("Location:doctor.php");
       exit(); 
    }else if($row['job']=='護士'){
  $stmt = $conn->prepare("INSERT INTO sign_in(signdate,signtime,user_ID)VALUES(CURDATE(),CURTIME(),?)");
  $count = $stmt->execute(array($uid));
       header("Location:nurse.php");
        exit();  
    }else {
        $msg2 = 'true';
         $msg = "登入失敗";
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <script src="js/jquery-1.11.3.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script>
              if(<?php echo $msg2?>){
                 alert("<?php echo $msg?>");
              }
          </script>
          <style>
  .form-signin {
	max-width:330px;
	padding: 15px;
	margin: 0 auto;
	}
  </style>

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand">看診系統-登入</a> 
        </div>
      </div>
    </nav>
 <div class="container" style="padding-top:70px;">
      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="input" class="sr-only">帳號</label>
        <input type="input" id="input" class="form-control" placeholder="帳號" name="account" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="密碼" name="password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button  class="btn btn-lg btn-primary btn-block"  type="submit">Sign in</button>
      </form>
    </div> 
    </body>
</html>
