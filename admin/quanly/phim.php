<?php
require_once '../../connect/db_connect.php';
session_start();
if(isset($_SESSION['adminName']))
{
	$db=new DB_Connect();
	$conn=$db->connect();
	if(isset($_POST['addP']))
	{
		$theloai=mysqli_real_escape_string($conn,$_POST['theloai']);
		$tenphim=mysqli_real_escape_string($conn,$_POST['tenphim']);
		$dienvien=mysqli_real_escape_string($conn,$_POST['dienvien']);
		$thongtinphim=mysqli_real_escape_string($conn,$_POST['thongtinphim']);
		$daodien=mysqli_real_escape_string($conn,$_POST['daodien']);
		$thoiluongphim=mysqli_real_escape_string($conn,$_POST['thoiluongphim']);
		$namsanxuat=mysqli_real_escape_string($conn,$_POST['namsanxuat']);
		$noisanxuat=mysqli_real_escape_string($conn,$_POST['noisanxuat']);
		$trailer=$_POST['trailer'];
		move_uploaded_file($_FILES['file']['tmp_name'], '../../images/'.$_FILES['file']['name']);
		$anh =$_FILES['file']['name'];
		$sql="select * from phim where tenphim='$tenphim'";
		$result=$conn->query($sql);
		if($result)
		{
			if(mysqli_num_rows($result)>0)
			{
				$response['message']='Phim đã tồn tại';
				$response['success']=3;
				echo json_encode($response);
			}else{
				$sql="Insert into phim(theloai,tenphim,dienvien,thongtinphim,daodien,thoiluongphim,namsanxuat,noisanxuat,anhminhhoa,trailer) values('$theloai','$tenphim','$dienvien','$thongtinphim','$daodien','$thoiluongphim','$namsanxuat','$noisanxuat','$anh','$trailer')";
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
	}else if(isset($_POST['deleteP'])){
		$id=mysqli_real_escape_string($conn,$_POST['id']);
		$sql="delete from phim where id='$id'";
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