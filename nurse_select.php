<?php
include './db.php';
header("Content-Type:text/html; charset=utf-8");
session_start();
$msg="";
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
$stmt = $conn->query("SELECT name,gender,tel,job,status 
FROM user,status,job 
WHERE user.job_ID=job.job_ID
AND status.status_ID=user.status_ID
AND job.job_ID='3'");
//$msg = '<table border="1" style="text-align:center" align="center" >';
$msg.='<thead><tr><th>姓名</th><th>性別</th><th>手機</th><th>職位</th><th>狀態</th></thead><tbody>';
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $msg.="<tr><td>" . $row['name'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['tel'] . "</td><td>" . $row['job'] . "</td><td>" . $row['status'] . "</td></tr>";
    //$count = $count + 1;
}
$msg.="</tbody>";
//return(json_encode($msg));
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href='css/footable.bootstrap.min.css' rel='stylesheet' />
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src='js/footable.min.js'></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
        <script>
//     jQuery(function($){
//	$('.table').footable({
//         "columns": $.get('columns.json'),
//        "paging": {
//               "enabled": true,
//                "limit": 1
//       }
//	});
//});
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
                data-url="nurse_select.php"
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

