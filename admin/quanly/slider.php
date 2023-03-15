<?php
require_once '../../connect/db_connect.php';
session_start();
if(isset($_SESSION['adminName']))
{
	$db=new DB_Connect();
	$conn=$db->connect();
	if(isset($_POST['addS']))
	{
		$phim=mysqli_real_escape_string($conn,$_POST['phim']);
		move_uploaded_file($_FILES['file']['tmp_name'], '../../images/'.$_FILES['file']['name']);
		$anh =$_FILES['file']['name'];
		$sql="Insert into slider(phim,anh) values('$phim','$anh')";
		$result=$conn->query($sql);
		if($result)
		{
			$response['message']='Thêm thành công';
			$response['success']=1;
			echo json_encode($response);
		}else{
			$response['message']='Thêm thất bại';
			$response['success']=2;
			echo json_encode($response);
		}
	}else if(isset($_POST['deleteS'])){
		$id=mysqli_real_escape_string($conn,$_POST['id']);
		$sql="delete from slider where id='$id'";
		$result=$conn->query($sql);
		if($result)
		{
			$response['message']='Xóa thành công';
			$response['success']=1;
			echo json_encode($response);
		}else{
			$response['message']='Xóa thất bại';
			$response['success']=2;
			echo json_encode($response);
		}
	}
}else{
	header("Location: /xedap/404.php");
}
?>