<html>
	<head>
		<title>管理用户</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<script tyep="text/javascript">
		<!--
			function comfirm_dele(val){
				return window.confirm("是否要删除id="+val+"的用户");
			}
		//-->
		</script>
	</head>
	<body>
		<?php
			require_once 'class/EmpService.class.php';
			require_once 'class/DivPage.php';
			$div_page=new DivPage();
			$div_page->page_now=1;
			$div_page->page_size=6;
			$div_page->goto_url="empManage.php";

			$emp_service=new EmpService();		
			if(!empty($_GET['comfirm_page'])){
				$div_page->page_now=$_GET['comfirm_page'];
			}
			$emp_service->get_div_page($div_page);
		?>
		<a href="mainView.php">返回主界面</a><br/>
		<a href="login.php">安全退出</a><br/>
		<table align="center" bordercolor="green" cellspacing="0" border="1" width="660px">
			<tr><td colspan="7" align="center"><font size="3" color="red">管理用户</font><br/></td></tr>
			<tr><th>用户ID</th><th>用户名</th><th>等级</th><th>邮箱地址</th><th>工资</th><th>修改用户</th><th>删除用户</th></tr>
			<?php
				$res=$div_page->res_array;
				if($res){
					$num = count($res);
					for($i=0;$i<$num;$i++){
						echo"<tr>";
						foreach ($res[$i] as $val){
							echo "<td>{$val}</td>";
						}
						$id=$res[$i]['id'];
						echo "<td><a href='chgEmp.php?id=$id'>修改用户</a></td>
						<td><a onclick='return comfirm_dele({$id})' href='empProcess.php?id=$id&operate=del'>删除用户</a></td></tr>";
					}
				}				
			?>
			<tr></tr>
		</table>
		<p align="center">
		<?php
			echo $div_page->navigate;
		?>
		<form action="empManage.php" method="get">
			跳转到：<input type="text" name="comfirm_page"/>
			<input type="hidden" name="name" value='<?php echo $name;?>'/>
			<input type="submit" value="跳转"/>
		</form>
		</p>
	</body>
</html>
