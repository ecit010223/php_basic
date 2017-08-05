<?php
/* 
 * 这是一个工具类
 * 用来对数据库的操作
 */
class SqlHelper{
	private $conn;
	public function __construct(){
		$this->conn=new mysqli("localhost","root","123456","test");
		if($this->conn->error){
			die("connect error：".$this->conn->error);
		}
		$this->conn->query("set names utf8");
	}
	
	//执行dql语句
	public function exec_dql($sql){
		$arr=array();
		$res=$this->conn->query($sql) or die($this->conn->error);
		while($row=$res->fetch_row()){
			$arr[]=$row;
		}
		$res->free();
		//此时得到的$arr是一个二维数组，它的第一维的每个下标指示一行数据
		return $arr;
	}
	
	/*
	 * 考虑分页情况的查询
	 * $sql1="select * from where 表名 limit 0,6";
	 * $sql2="select count(id) from 表名";
	 * $div_page是DivPage的实例化对
	 */
	public function exec_dql_div_page($sql1,$sql2,$div_page){
		$res=$this->conn->query($sql1) or die($this->conn->error);
		$arr=array();
		//将得到的结果集存储到数组中
		while($row=$res->fetch_assoc()){
			$arr[]=$row;
		}
		$div_page->res_array=$arr;
		$res->free();
		
		$res2=$this->conn->query($sql2) or die($this->conn->error);
		if($row=$res2->fetch_row()){
			$div_page->page_count = ceil($row[0]/$div_page->page_size);
		}
		$res2->free();
		
		$navigate="";
		$page_whole=10;
		$start=floor(($div_page->page_now-1)/$page_whole)*$page_whole+1;
		$index=$start;
		if($div_page->page_now>1){
			$pre_page=$div_page->page_now-1;
			$navigate="<a href='{$div_page->goto_url}?comfirm_page=".$pre_page."'><上一页></a>";
		}
		if($div_page->page_now>$page_whole){
			$navigate.=" <a href='{$div_page->goto_url}?comfirm_page=".($start-1)."'><<&nbsp;&nbsp;</a> ";
		}
		for(;$start<$index+$page_whole&&$start<=$div_page->page_count;$start++){
			$navigate.=" <a href='{$div_page->goto_url}?comfirm_page=$start'>".$start."</a> ";
		}
		if($div_page->page_now<=$div_page->page_count-$div_page->page_count%$page_whole){
			$navigate.=" <a href='{$div_page->goto_url}?comfirm_page=$start'>&nbsp;&nbsp;>></a> ";
		}
		if($div_page->page_now<$div_page->page_count){
			$next_page=$div_page->page_now+1;
			$navigate.="<a href='{$div_page->goto_url}?comfirm_page=".$next_page."'><下一页></a>";
		}
			
		$navigate.="<br/>当前为第".$div_page->page_now."页/共".$div_page->page_count."页<br/>";
		$div_page->navigate=$navigate;
	}
	
	//执行dml语句
	public function exec_dml($sql){
		$b=$this->conn->query($sql) or die($this->conn->error);
		if(!$b){
			return 1;
		}else{
			if($this->conn->affected_rows>0){
				return 2;	//表示执行成功
			}else{
				return 3;	//表示没有行受到影响
			}
		}
	}

	public function close_connect(){
		if(!empty($this->conn)){
			$this->conn->close();
		}
	}
}
?>