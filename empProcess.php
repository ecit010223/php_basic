<?php
	require_once 'class/SqlHelper.class.php';
	require_once 'class/EmpService.class.php';
	header("content-type:text/html;charset=utf-8");
	echo "<a href='empManage.php'>返回管理页面</a><br/>";
	
	$emp_service=new EmpService();
	if(!empty($_GET['operate'])){
		$operate=$_GET['operate'];
		if($operate=="add"){
			if(empty($_POST['user_name'])||empty($_POST['grade'])||empty($_POST['email'])||empty($_POST['salary'])){
				header("location:addEmp.php?add_res=1");
				exit();
			}else{
				$user_name=$_POST['user_name'];
				$grade=$_POST['grade'];
				$email=$_POST['email'];
				$salary=$_POST['salary'];
				$add_res=$emp_service->add_emp($user_name, $grade, $email, $salary);
				header("location:addEmp.php?add_res=$add_res");
				exit();
			}
		}elseif($operate=="change"){
			if(empty($_POST['id'])||empty($_POST['user_name'])||empty($_POST['grade'])||empty($_POST['email'])||empty($_POST['salary'])){
				header("location:chgEmp.php?chg_res=1");
				exit();
			}else{
				$id=$_POST['id'];
				$name=$_POST['user_name'];
				$grade=$_POST['grade'];
				$email=$_POST['email'];
				$salary=$_POST['salary'];
				$chg_res=$emp_service->chg_emp($id, $name, $grade, $email, $salary);
				if($chg_res==2){
					echo "<font size=4 color=red>修改成功！</font>";
					exit();
				}else{
					echo "<font size=4 color=red>修改不成功！</font>";
					exit();
				}
			}
		}elseif ($operate=="del"){
			if(!empty($_GET['id'])){
				$id=$_GET['id'];
				$res=$emp_service->del_emp_by_id($id);
				if($res==2){
					header("Location:empManage.php");
					exit();
				}else{
					echo "删除不成功!";
					exit();
				}
			}
		}
	}
?>