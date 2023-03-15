<?php
require_once '../../connect/db_connect.php';
session_start();
if(isset($_SESSION['adminName']))
{
	$db=new DB_Connect();
	$conn=$db->connect();
	if(isset($_POST['addU']))
	{
		$hoten=mysqli_real_escape_string($conn,$_POST['hoten']);
		$taikhoan=mysqli_real_escape_string($conn,$_POST['taikhoan']);
		$matkhau=mysqli_real_escape_string($conn,$_POST['matkhau']);
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$diachi=mysqli_real_escape_string($conn,$_POST['diachi']);
		$sdt=mysqli_real_escape_string($conn,$_POST['sdt']);
		$sql="select * from user where taikhoan='$taikhoan' or email='$email'";
		$result=$conn->query($sql);
		if($result)
		{
			if(mysqli_num_rows($result)>0)
			{
				$response['message']='Thông tin bị trùng đã tồn tại';
				$response['success']=3;
				echo json_encode($response);
			}else{
				$sql="Insert into user(hoten,taikhoan,matkhau,diachi,sdt,email) values('$hoten','$taikhoan','$matkhau','$sdt','$diachi','$email')";
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
	}else if(isset($_POST['deleteU'])){
		$id=mysqli_real_escape_string($conn,$_POST['id']);
		$sql="delete from user where id='$id'";
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