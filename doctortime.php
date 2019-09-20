<?php
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
?>
<html>
    <head>
        <meta charset='utf-8' />
        <link href='css/fullcalendar.min.css' rel='stylesheet' />
        <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <script src='js/moment.min.js'></script>
        <script src='js/jquery.min.js'></script>
        <script src='js/fullcalendar.min.js'></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script>

            $(document).ready(function () {
                
                $('.calendar').fullCalendar({
                    header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},

                    //改成讀系統時間
                    defaultDate: '2017-1-4',
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: "events2.php",
                });

            });

        </script>

        <style>

            body {
                margin: 40px 10px;
                padding: 0;
                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                font-size: 14px;
            }

            .calendar {
                max-width: 900px;
                margin: 0 auto;
            }

        </style>
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
        <div class="form-group">
            <div class="calendar"></div>
        </div>
    </body>
</html>
