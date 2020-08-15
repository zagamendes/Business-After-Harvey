<?php
	class Connection{
		private static $host="cdm1s48crk8itlnr.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
		private static $user="uageuej2c378lp56";
		private static $password="d290e7qu7zq9w5ii";
		private static $data_base="rlxwewubb9x4xj8d";

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
