<?php
session_start();
if(!isset($_SESSION["adminName"]))
{
	header("Location: /phimhay/404.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="/phimhay/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/phimhay/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/phimhay/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['adminName'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="theloai.php"><i class="fa fa-fw fa-table"></i> Thể loại</a>
                    </li>
                    <li >
                        <a href="phim.php"><i class="fa fa-fw fa-table"></i> Phim</a>
                    </li>
					<li class="active">
                        <a href="user.php"><i class="fa fa-fw fa-table"></i> User</a>
                    </li>
					<li>
                        <a href="slider.php"><i class="fa fa-fw fa-table"></i> Slider</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#thongke"><i class="fa fa-fw fa-arrows-v"></i> Thống kê <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="thongke" class="collapse">
						<li>
                                <a href="thongkexemnhieu.php">Thống kê xem nhiều</a>
                            </li>
                            <li>
                                <a href="thongkephimmoidang.php">Thống kê phim mới đăng</a>
                            </li>
							<li>
                                <a href="gopy.php">Thống kê góp ý</a>
                            </li>
								<li>
                                 <a href="binhluan.php">Thống kê bình luận</a>
                            </li> 
                            <li>
                                <a href="thongketiennap.php">Thống kê tiền nạp</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Admin</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i> User
                            </li>
							<li class="active">
                                <i class="fa fa-table"></i> Sửa
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-md-10 col-md-offset-4">
						<div class="col-lg-4">
						<?php
							require_once '../connect/db_connect.php';
							$id=$_GET['id'];
							$db=new DB_Connect();
							$conn=$db->connect();
							$sql="select * from user where id='$id'";
							$result=$conn->query($sql);
							$row=mysqli_fetch_assoc($result);
							if(isset($_POST["submit"]))
							{
								$hoten=$_POST['hoten'];
								$taikhoan=$_POST['taikhoan'];
								$matkhau=$_POST['matkhau'];
								$sdt=$_POST['sdt'];
								$diachi=$_POST['diachi'];
								$email=$_POST['email'];
								$sql="select * from user where taikhoan='$taikhoan' or email!='$email'";
								$result=$conn->query($sql);
								if($result)
								{
									if(mysqli_num_rows($result)>1)
									{
										echo '<script language="javascript">';
										echo 'alert("Đã có thể loại này rồi này")';
										echo '</script>';
									}else{
										$sql="Update user set hoten='$hoten',taikhoan='$taikhoan',matkhau='$matkhau',email='$email',diachi='$diachi',sdt='$sdt' where id='$id'";
										$result=$conn->query($sql);
										if($result)
										{
											header("Location: /phimhay/admin/user.php");
										}else{
											echo '<script language="javascript">';
											echo 'alert("Sửa thất bại")';
											echo '</script>';
										}
									}
								}else{
									echo '<script language="javascript">';
									echo 'alert("Có lỗi xảy ra")';
									echo '</script>';
								}
							}
							?>
							<form action="#" role="form" method="post">
								<table>
									<tr>
										<td><label>Họ tên</label></td>
										<td><input type="text" name="hoten" class="form-control" value="<?php echo $row['hoten'] ?>"></td>
									</tr>
									<tr>
										<td><label>Tài khoản</label></td>
										<td><input type="text" name="taikhoan" class="form-control" value="<?php echo $row['taikhoan'] ?>"></td>
									</tr>
									<tr>
										<td><label>Mật khẩu</label></td>
										<td><input type="text" name="matkhau" class="form-control" value="<?php echo $row['matkhau'] ?>"></td>
									</tr>
									<tr>
										<td><label>Địa chỉ</label></td>
										<td><input type="text" name="diachi" class="form-control" value="<?php echo $row['diachi'] ?>"></td>
									</tr>
									<tr>
										<td><label>SĐT</label></td>
										<td><input type="text" name="sdt" class="form-control" value="<?php echo $row['sdt'] ?>"></td>
									</tr>
									<tr>
										<td><label>Email</label></td>
										<td><input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>"></td>
									</tr>
									<tr>
										<td></td>
										<td><button type="submit" name="submit" class="btn btn-sm btn-success">OK</button>
										<button type="reset" class="btn btn-sm btn-warning">Reset</button></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/phimhay/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/phimhay/js/bootstrap.min.js"></script>
</body>

</html>
