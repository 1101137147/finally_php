<?php
session_start();
		//將session清空
		unset($_SESSION['name']);
                unset($_SESSION['user_ID']);
		echo '登出中......';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
		?>

