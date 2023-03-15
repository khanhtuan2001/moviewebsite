<?php
class DB_Connect{
	function __construct()
	{
		$this->connect();
		
	}
	function connect()
	{
		require_once 'db_config.php';
		$conn=new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
		mysqli_set_charset( $conn, 'utf8' );
		mysqli_query($conn,"SET GLOBAL event_scheduler = ON");
		return $conn;
	}
	function close($con)
	{
		mysqli_close($con);
	}
}
?>