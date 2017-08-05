<html>
	<head>
		<title>管理员登陆</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
	</head>
	<body>
	<form action="loginProcess.php" method="post">
		<table align="center">		
			<tr><td colspan="2" align="center"><h1>管理员登录</h1></td></tr>
			<tr><td>帐&ensp;&ensp;号：</td><td><input type="text" name="user_id" value="<?php if(!empty($_COOKIE['user_id'])){echo $_COOKIE['user_id'];}?>"/></td></tr>
			<tr><td>密&ensp;&ensp;码：</td><td><input type="password" name="passwd" value="<?php if(!empty($_COOKIE['passwd'])){echo $_COOKIE['passwd'];}?>"/></td></tr>
			<tr><td colspan="2">是否要保存用户名和密码<input type="checkbox" name="cookie_chk"/></td></tr>
			<tr align="center"><td colspan="2"><input type="submit" value="登陆"/></td></tr>
			<tr align="center"><td colspan="2">
			<?php
				if(!empty($_GET['error'])){
					$error_no=$_GET['error'];
					if($error_no==1){
						echo "<font size=3 color=red>请输入帐号或密码！</font>";
					}else if($error_no==2){
						echo "<font size=3 color=red>请输入正确密码！</font>";
					}else{
						echo "<font size=3 color=red>请输入正确帐号！</font>";
					}
				}
			?>
			</td></tr>
		</table>
	</form>
	</body>
</html>