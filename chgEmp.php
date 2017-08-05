<html>
	<head>
		<title>修改用户</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	</head>
	<body>
		<?php
		require_once 'class/SqlHelper.class.php';
		require_once 'class/EmpService.class.php';
		if(!empty($_GET['id'])){
			$id=$_GET['id'];
			$emp_service=new EmpService();
			$res=$emp_service->get_emp_by_id($id);
		}
		?>
		<a href="empManage.php">返回管理页面</a>
		<form action="empProcess.php?operate=change" method="post">
			<table align="center" border="1">
				<input type="hidden" name="id" value='<?php echo $id; ?>'/>
				<tr><th colspan="2">修改用户</th></tr>
				<tr><td>用户名：</td><td><input type="text" name="user_name" value="<?php echo $res[0][1] ?>"/></td></tr>
				<tr><td>等&ensp;&ensp;级：</td>
					<td><select name="grade" value="<?php echo $res[0][2] ?>">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select></td>
				</tr>
				<tr><td>邮箱地址：</td><td><input type="text" name="email" value="<?php echo $res[0][3] ?>"/></td></tr>
				<tr><td>工&ensp;&ensp;资：</td><td><input type="text" name="salary" value="<?php echo $res[0][4] ?>"/></td></tr>
				<tr align="center"><td><input type="submit"/ value="提交"></td><td><input type="reset" value="重置"/></td></tr>
			</table>
		</form>
	</body>
</html>
