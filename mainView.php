<html>
	<head>
		<title>主界面</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	</head>
	<body>
		<?php
			if(!empty($_COOKIE['login_time'])){
				echo "上次登陆的时间为：".$_COOKIE['login_time']."<br/>";
				date_default_timezone_set("Asia/Chongqing");
				setcookie("login_time",date("Y-m-d H:i:s"),time()+3600*24*30);
			}
		?>
		<a href="login.php">返回重新登陆</a>
		<table align="center">
			<tr align="center"><td><font size="6">主界面</font></td></tr>	
			<tr align="center"><td><font size="3"><a href="empManage.php">管理用户</a></font></td></tr>
			<tr align="center"><td><font size="3"><a href="addEmp.php">添加用户</a></font></td></tr>
			<tr align="center"><td><font size="3"><a href="findEmp.php">查找用户</a></font></td></tr>
			<tr align="center"><td><font size="3"><a href="login.php">安全退出</a></font></td></tr>
		</table>
	</body>
</html>