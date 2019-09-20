<?php
session_start();
$uid=$_SESSION['user_ID'];
$username=$_SESSION['name'];
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-時間選擇器->

        <link rel="Stylesheet" href="css/jquery.timepicker.css" />  
        <script type="text/javascript" src="js/jquery.min.js"></script>  
        <script type="text/javascript" src="js/jquery.timepicker.js"></script>  

        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
<!--        <script src="js/jquery-1.11.3.min.js"></script>-->
        <script src="js/bootstrap.min.js"></script>
        <script>
              function check() {
                    var num1 = $(".dateTime").val();
                    var num2 = $(".dateTime2").val();
                    if ((num1 !== '') && (num2 !== '')) {
                        if (num1 > num2) {
                            alert("開始時間不能大於結束時間");
                            return false;
                        }
                    } else {
                        alert("請選擇日期")
                        return false;
                    }
                    return true;
                };
    $(function () {
                //jQuery datepicker 設定限制日期最小最大 minDate maxDate hideIfNoPrevNext
                $(".datepicker").datepicker({
                    //顯示上個月日期 及下個月日期 ，但是不可選的。
                    //default:false
                    showOtherMonths: true,
                    // 設置當沒有上一個/下一個可選擇的情況下，隱藏掉相應的按鈕。（默認為不可用）
                    //配合有設定最大最小時使用
                    //default:false
                    hideIfNoPrevNext: true,
                    //設置一個最小的可選日期。可以是Date對象，或者是數字（從今天算起，例如+7），
                    //或者有效的字符串('y'代表年, 'm'代表月, 'w'代表周, 'd'代表日, 例如：'+1m +7d')。
                    minDate: "-0d",
                    //  設置一個最大的可選日期。可以是Date對象，或者是數字（從今天算起，例如+7），
                    //或者有效的字符串('y'代表年, 'm'代表月, 'w'代表周, 'd'代表日, 例如：'+1m +7d')。
                    maxDate: "+10d",
                    dateFormat: "yy-mm-dd",
                    timeFormat: 'HH:mm:ss'
                });
            });
        </script>
        <script type="text/javascript">         
            $(function () {
                $('#demo-1').timepicker().focus();
            });
            $(function () {
                $('#demo-2').timepicker().focus();
            });
            $.TimePicker.defaults = {
                timeFormat: 'HH:mm',
                minHour: null,
                minMinutes: null,
                minTime: null,
                maxHour: null,
                maxMinutes: null,
                maxTime: null,
                startHour: null,
                startMinutes: null,
                startTime: null,
                interval: 10,
                dynamic: true,
                theme: 'standard',
                zindex: null,
                dropdown: true,
                scrollbar: false,
                // callbacks
                change: function (/*time*/) {}
            };
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">看診管理
                                <span class="caret"></span></a>
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
        <br> <br> <br>    
             <form class="form-horizontal" name="myForm" action="doctorReservation.php" method="post" onsubmit="return check()">
                  <h2 class="form-docinsert">新增看診時段</h2>
                   <div class="form-group">
		<label for="dateSelection" class="col-sm-2 control-label">日期</label>
		<div class="col-sm-10">
			<input type="text" class="form-control datepicker" id="dateSelection" name="dateSelection" placeholder="日期" required/>
		</div>
		</div>
                
                <div class="form-group">
		<label for="dateTime" class="col-sm-2 control-label">開始時間</label>
		<div class="col-sm-10">
			<input type="text" class="form-control dateTime " id="demo-1" name="dateTime" placeholder="開始時間" value="06:30" required>
		</div>
		</div>
                  
                 <div class="form-group">
		<label for="dateTime2" class="col-sm-2 control-label">結束時間</label>
		<div class="col-sm-10">
			<input type="text" class="form-control dateTime2" id="demo-2" name="dateTime2" placeholder="結束時間" value="06:30" required>
		</div>
		</div>
                  
                <div class="form-group">
		<label for="length" class="col-sm-2 control-label">看診時長(分鐘)</label>
		<div  id="datetimepicker" class="input-append col-sm-5">
			<input type="number" step="10" min="10" max="60"  class="form-control" id="length" name="length" placeholder="看診時長" required/>
		</div>
		</div>
                  
                  <div class="col-sm-offset-2 col-sm-10">
			<button type="submit"  class="btn btn-danger">新增</button>
		</div>
            </form>
        <div>
        </div>
    </body>
</html>