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
     $search2='';
      if (!empty($_POST['startdate'])) {
          $search.=$_POST['startdate'];
          if($_POST['search'] == "startdate"){
              $search=$_POST['startdate'];
          }
      }
      if (!empty($_POST['enddate'])) {
          $search2.=$_POST['enddate'];
          if($_POST['search2'] == "enddate"){
              $search2=$_POST['enddate'];
          }
      }  
      
 $stmt = $conn->prepare("SELECT name,gender,COUNT(diagnosis.doctor_ID) as peocount
from user,diagnosis
WHERE user.user_ID=diagnosis.doctor_ID
And diagnosis_date between ? and ?
GROUP BY name,gender");

$stmt->execute(array($search,$search2));
$msg = ' <table  data-toggle="table" data-url="man_doctor_count_list.php" data-query-params="queryParams" data-height="550" data-show-refresh="true" data-show-toggle="true" data-search="true" data-pagination="true" data-show-columns="true">';
$msg.='<thead><tr><th>姓名</th><th>性別</th><th>看診人數</th></thead><tbody>';
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $msg.="<tr><td>" . $row['name'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['peocount'] . "</td></tr>";
    //$count = $count + 1;
}
$msg.="</tbody></table>";

    //$row = $stmt->fetch();
}

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
                function check() {
                    var num1 = $("#startdate").val();
                    var num2 = $("#enddate").val();
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
                    <a class="navbar-brand" >看診系統-管理員</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="man_doctor_count_list.php">看診人數查詢</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">醫生管理<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="doctor_select.php">查詢醫生</a></li>
                                <li><a href="doctor_insert_list.php">新增醫生</a></li>
                                <li><a href="doctor_update_list.php">修改醫生</a></li>
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
                        <li><a href="#"><?php echo "歡迎您　" . $username; ?></a></li>
                        <li><a href="logout.php">登出</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <br><br><br>
         <form class="form-horizontal" action="" method="post" onsubmit="return check()">
        <div class="form-group">

            <table border="0" align="center">
                <tr>
                    <td>看診期間</td>
                    <td> 
                        <div class="col-sm-5">
                            <div class="input-group date"  data-date-format="yyyy-mm-dd">
                                <input class="form-control" id="startdate" name="startdate" type="date" >                      
                            </div>          
                        </div>

                    </td>
                    <td><div>～</div></td>
                    <td>
                        <div class="col-sm-5">
                            <div class="input-group date"  data-date-format="yyyy-mm-dd">
                                <input class="form-control" id="enddate" name="enddate" type="date" >                       
                            </div>  
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger"  id="btn" name="submit">查詢</button>
                        </div>

                    </td>
            　</tr>
            </table>	
        </div>
         </form>
         <?php
                    echo $msg;
                    ?>
    </body>
</html>

