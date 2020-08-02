<?php
	class Connection{
		private static $host="localhost";
		private static $user="root";
		private static $password="vertrigo";
		private static $data_base="harvey";

		public static function connect_db(){
			$connection=@mysqli_connect(self::$host,self::$user,self::$password,self::$data_base);
			if(!$connection){
				die("Erro ao conectar com o banco de dados. ".mysqli_connect_error());
			}
			return $connection;	
		}

		public static function close_db($connection){
			if(mysqli_close($connection)){
				//echo "fechou";
			}else{
				//echo "nao fechou";
			}
		}

	}
