<?php
	class DivPage{
		public $page_size=6;
		public $res_array;	//这是显示数据
		public $row_count;	//从数据库中获取
		public $page_now;	//用户指定
		public $page_count;	//计算得出
		public $navigate;
		public $goto_url;
	}
?>