<html>
	<head>
		<title>添加用户</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	</head>
	<body>
		<a href="mainView.php">返回主界面</a>
		<form action="empProcess.php?operate=add" method="post">
			<table align="center" border="1">
				<tr><th colspan="2">添加用户</th></tr>
				<tr><td>用户名：</td><td><input type="text" name="user_name""/></td></tr>
				<tr><td>等&ensp;&ensp;级：</td>
					<td><select name="grade">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select></td>
				</tr>
				<tr><td>邮箱地址：</td><td><input type="text" name="email"/></td></tr>
				<tr><td>工&ensp;&ensp;资：</td><td><input type="text" name="salary"/></td></tr>
				<tr align="center"><td><input type="submit"/ value="提交"></td><td><input type="reset" value="重置"/></td></tr>
				<tr><td colspan="2">
				<?php 
					if(!empty($_GET['add_res'])){
						$add_res=$_GET['add_res'];
						if($add_res==1){
							echo "<font size=4 color=red>请完成输入！</font>";
						}else if($add_res==2){
							echo "<font size=4 color=red>添加成功！</font>";
						}else{
							echo "<font size=4 color=red>添加不成功！</font>";
						}
					}
				?></td></tr>
			</table>
		</form>
	</body>
</html>