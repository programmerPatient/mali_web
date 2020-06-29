<?php

class Mysql{
	private static $_instance;

	private $db_host;//主机名
	private $db_user;//数据库用户名
	private $db_pwd;//数据库用户名密码
	private $db_database;//数据库名
	private $conn;//数据库连接标识
	private $sql;//sql执行语句
	private $coding;//数据库的编码，GBK,UTF8,gb2312
	private $show_error = true;


	/*构造函数*/
	private function __construct($db_host,$db_user,$db_pwd,$db_database,$conn,$coding){
		$this->db_host = $db_host;
		$this->db_user = $db_user;
		$this->db_pwd = $db_pwd;
		$this->db_database = $db_database;
		$this->conn = $conn;
		$this->coding = $coding;
		$this->connect();
	}

	private function __clone(){}

	public static function getInstance($db_host,$db_user,$db_pwd,$db_database,$conn,$coding){
		if(is_null(self::$_instance)){
			self::$_instance = new self($db_host,$db_user,$db_pwd,$db_database,$conn,$coding);
		}
		return self::$_instance;
	}
	/*数据库连接*/
	public function connect(){
		if($this->conn == "pconn"){
			//永久连接
			$this->conn = mysqli_pconnect($this->db_host,$this->db_user,$this->db_pwd) or die('链接数据库失败');
		}else{
			//即时连接
			$this->conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pwd) or die('链接数据库失败');
		}

		mysqli_select_db($this->conn,$this->db_database) or die("选择数据库失败"); 


		mysqli_query($this->conn,"SET NAMES $this->coding") or die("设置编码失败");//设置数据库编码
	}


	/*数据库执行语句，可以执行增删改查等任何sql语句*/
	public function query($sql){
		if($sql == ""){
			$this->show_error("SQL语句错误：", "SQL查询语句为空");
		}

		$this->sql = $sql;
		// mysqli_query( $this->conn,$this->sql) or die('错误的SQL语句'.$this->sql);
		$result = mysqli_query($this->conn,$this->sql);

		if(!$result){
			//调式模式下，sql语句出错会自动打印
			if($this->show_error){
				$this->show_error('错误的SQL语句：', $this->sql);
			}
		}else{
			$this->result = $result;
		}

		return $this->result;
	}


	/*插入数据操作*/
	public function insert($array,$table){
		$keys = join(',',array_keys($array));
		$values = "'".join("','",array_values($array))."'";
		$sql = "INSERT {$table}({$keys}) VALUES ({$values})";
		$this->sql = $sql;
		$res = $this->query($sql);
		return $res;
	}

	/*更新操作*/
	public function update($array,$table,$where=null){
		foreach($array as $key=>$val){
			$sets .= $key . "='".$val."',";
		}

		$sets = rtrim($sets,',');//去掉sql里的最后一个','
		$where = $where ==  null ? '':' WHERE'.$where;
		$sql = "UPDATE {$table} SET {$sets} {$where}";
		$this->sql = $sql;
		$res = $this->query($sql);
		return $res;
	}

	/*删除操作*/
	public function delete($table,$where=null){
		$where = $where == null ? '':' WHERE'.$where;
		$sql = "DELETE FROM {$table} {$where}";
		$this->sql = $sql;
		$res = $this->query($sql);
		return $res;
	}


	/*清空数据表，重置自增id为1*/
	public function truncate($table){
		$sql = "TRUNCATE table {$table}";
		$this->sql = $sql;
		$res = $this->query($sql);
		return $res;
	}

	/*查询一条记录操作*/
	public function fetch_one($sql,$result_type = MYSQLI_ASSOC){
		$this->sql = $sql;
		$result = $this->query($sql);
		if($result && mysqli_num_rows($result) > 0){
			return mysqli_fetch_array($result,$result_type);
		}else{
			return false;
		}
	}


	/*查询表中的所有记录*/
	public function fetch_all($sql,$result_type = MYSQLI_ASSOC){
		$this->sql = $sql;
		$result=$this->query($sql);
		if ($result && mysqli_num_rows($result)>0){
			while ($row= $result->fetch_assoc()){
				$rows[]= $row;
			}
			return $rows;
		}else {
			return false;
		}
	}


	/*取得结果集的记录数*/
	public function get_total_rows($sql){
		$this->sql = $sql;
		$result = $this->query($sql);
		if($result){
			return mysqli_num_rows($result);
		}else{
			return false;
		}
	}

	/*数据库的选择*/
	public function select_db($db_database){
		return mysqli_select_db($db_database);
	}


	/*添加新的数据库*/
	public function create_database($database_name){
		$database = $database_name;
		$sql_database = 'create database' . $database;
		$this->sql = $sql;
		$this->query($sql_database);
	}


	/*断开mysql链接*/
	public function close($link = null){
		return mysqli_close($link);
	}

	/*错误处理*/
	public function show_error($descript = '',$sql = ''){
		die($description.''.$sql);
	}
}