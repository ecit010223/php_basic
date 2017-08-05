<?php
	/*
	 * 该类是业务逻辑处理类，用来编写对admin表的操作
	 */
	require_once 'class/SqlHelper.class.php';
	class AdminService{
		
		//验证用户是否合法
		public function check_admin($id,$password){
			$sql="select password,name from admin where id=$id";
			$sql_helper=new SqlHelper();
			$res=$sql_helper->exec_dql($sql);
			if(count($res)==1){
				if($res[0][0]==md5($password)){
					return 1;	//密码正确
				}else{
					return 2;	//密码错误
				}
			}else{
				return 3;	//用户名不存在
			}
			//释放资源
			$sql_helper->close_connect();
		}
	} 
?>