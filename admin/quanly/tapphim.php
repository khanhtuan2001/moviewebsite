<?php
require_once '../../connect/db_connect.php';
session_start();
if(isset($_SESSION['adminName']))
{
	$db=new DB_Connect();
	$conn=$db->connect();
	if(isset($_POST['addTP']))
	{
		$id=mysqli_real_escape_string($conn,$_POST['id']);
		$tentap=mysqli_real_escape_string($conn,$_POST['tentap']);
		$linkphim=mysqli_real_escape_string($conn,$_POST['linkphim']);
		$sql="select * from tapphim where tentap='$tentap'";
		$result=$conn->query($sql);
		if($result)
		{
			if(mysqli_num_rows($result)>0)
			{
				$response['message']='Tập phim đã tồn tại';
				$response['success']=3;
				echo json_encode($response);
			}else{
				$sql="Insert into tapphim(tentap,phim,linkphim) values('$tentap',$id,'$linkphim')";
				$result=$conn->query($sql);
				if($result)
				{
					$response['message']='Thêm thành công';
					$response['success']=1;
					echo json_encode($response);
				}else{
					$response['message']='Thêm thất bại';
					$response['success']=4;
				echo json_encode($response);
				}
			}
		}else{
			$response['message']='Có lỗi xảy ra';
			$response['success']=2;
			echo json_encode($response);
		}
	}else if(isset($_POST['deleteTP'])){
		$id=mysqli_real_escape_string($conn,$_POST['id']);
		$sql="delete from tapphim where id='$id'";
		$result=$conn->query($sql);
		if($result)
		{
			$response['message']='Xóa thành công';
			$response['success']=1;
			echo json_encode($response);
		}else{
			$response['message']='Có lỗi xảy ra';
			$response['success']=2;
			echo json_encode($response);
		}
	}
}else{
	header("Location: /phimhay/404.php");
}
?>