<?php
	/*
	 * 它的一个实例对象就表示admin表的一条记录
	 * admin表中每个字段都用一个成员变量表示
	 */
	class Admin{
		private $id;
		private $name;
		private $password;
		
		public function __construct(){
			$sql_helper=new SqlHelper();
			$sql="select * from emp";
			$res=$sql_helper->exec_dql($sql);
		}
		/**
		 * @return the $id
		 */
		public function getId() {
			return $this->id;
		}
	
			/**
		 * @return the $name
		 */
		public function getName() {
			return $this->name;
		}
	
			/**
		 * @return the $password
		 */
		public function getPassword() {
			return $this->password;
		}
	
			/**
		 * @param field_type $id
		 */
		public function setId($id) {
			$this->id = $id;
		}
	
			/**
		 * @param field_type $name
		 */
		public function setName($name) {
			$this->name = $name;
		}
	
			/**
		 * @param field_type $password
		 */
		public function setPassword($password) {
			$this->password = $password;
		}

	} 
?>