<?php
	require_once 'class/SqlHelper.class.php';
	class EmpService{
		
		//添加员工
		public function add_emp($name,$grade,$email,$salary){
			$sql="insert into emp(name,grade,email,salary)  values('$name',$grade,'$email',$salary)";
			$sql_helper=new SqlHelper();
			$add_res=$sql_helper->exec_dml($sql);
			$sql_helper->close_connect();
			return $add_res;
		}
		
		//修改员工
		public function chg_emp($id,$name,$grade,$email,$salary){
			$sql="update emp set name='$name',grade=$grade,email='$email',salary=$salary where id=$id";
			$sql_helper = new SqlHelper();
			$chg_res=$sql_helper->exec_dml($sql);
			$sql_helper->close_connect();
			return $chg_res;
		}
		
		//返回共多少页
		public function get_page_count($page_size){
			$sql="select count(id) from emp";
			$sql_helper = new SqlHelper();
			$res = $sql_helper->exec_dql($sql);
			$page_count=ceil($res[0][0]/$page_size);
			$sql_helper->close_connect();
			return $page_count;	
		}
		
		//返回当页的员工
		public function get_emp_list_by_page($page_now,$page_size){
			$start_count=($page_now-1)*$page_size;
			$sql="select * from emp limit $start_count,$page_size";
			$sql_helper= new SqlHelper();
			//$res在这里是一个数组
			$res = $sql_helper->exec_dql($sql);
			//释放资源
			$sql_helper->close_connect();
			return $res;
		}
		public function get_div_page($div_page){
			$sql_helper=new SqlHelper();
			$sql1="select * from emp limit ".($div_page->page_now-1)*$div_page->page_size."
			,".$div_page->page_size;
			$sql2="select count(id) from emp";
			$sql_helper->exec_dql_div_page($sql1, $sql2, $div_page);
			$sql_helper->close_connect();
		}
		public function del_emp_by_id($id){
			$sql_helper=new SqlHelper();
			$sql="delete from emp where id=$id";
			$res=$sql_helper->exec_dml($sql);
			$sql_helper->close_connect();
			return $res;
		}
		public function get_emp_by_id($id){
			$sql_helper=new SqlHelper();
			$sql="select * from emp where id='$id'";
			$res=$sql_helper->exec_dql($sql);
			$sql_helper->close_connect();
			return $res;
		}
	} 
?>