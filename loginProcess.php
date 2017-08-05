<?php
	require_once 'class/AdminService.class.php';
	if(empty($_POST['user_id'])||empty($_POST['passwd'])){
		header("Location:login.php?error=1");
		exit();	//跳转后没有必要再执行下去，可加速进程的结束
	}else{
		$user_id=$_POST['user_id'];
		$passwd=$_POST['passwd'];
		$admin_service = new AdminService();
		$res=$admin_service->check_admin($user_id, $passwd);
		if($res==1){
			if(!empty($_POST['cookie_chk'])){
				setcookie("user_id",$user_id,time()+3600);
				setcookie("passwd",$passwd,time()+3600);
			}else{
				setcookie("user_id","",time()+3600);
				setcookie("passwd","",time()+3600);
			}
			date_default_timezone_set("Asia/Chongqing");
			setcookie("login_time",date("Y-m-d H:i:s"),time()+3600*24*30);
			header("Location:mainView.php");
			exit();
		}else if($res==2){
			header("Location:login.php?error=2");
			exit();
		}else{
			header("Location:login.php?error=3");
			exit();
		}
	}
?>