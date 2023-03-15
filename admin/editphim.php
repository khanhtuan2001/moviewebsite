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
                    <li>
                        <a href="theloai.php"><i class="fa fa-fw fa-table"></i> Thể loại</a>
                    </li>
                    <li class="active">
                        <a href="phim.php"><i class="fa fa-fw fa-table"></i> Phim</a>
                    </li>
					<li>
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
                                <i class="fa fa-table"></i> Phim
                            </li>
							<li class="active">
                                <i class="fa fa-table"></i> Sửa
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-md-12 col-md-offset-3">
						<div class="col-lg-12 ">
								<?php
								require_once '../connect/db_connect.php';
								$id=$_GET['id'];
								$db=new DB_Connect();
								$conn=$db->connect();
								$sql="select tenphim,anhminhhoa,dienvien,thongtinphim,daodien,thoiluongphim,namsanxuat,noisanxuat,theloai.id,theloai.theloai,trailer from phim,theloai where phim.id='$id' and theloai.id=phim.theloai";
								$result=$conn->query($sql);
								$row=mysqli_fetch_row($result);
								if(isset($_POST["submit"]))
								{
									$tenphim=$_POST['tenphim'];
									$dienvien=$_POST['dienvien'];
									$thongtinphim=$_POST['thongtinphim'];
									$daodien=$_POST['daodien'];
									$thoiluongphim=$_POST['thoiluongphim'];
									$namsanxuat=$_POST['namsanxuat'];
									$noisanxuat=$_POST['noisanxuat'];
									$theloai=$_POST['theloai'];
									$trailer=$_POST['trailer'];
									$sql="select * from phim where tenphim='$theloai' and $id!='$id'";
									$result=$conn->query($sql);
									if($result)
									{
										if(mysqli_num_rows($result)>0)
										{
											echo '<script language="javascript">';
											echo 'alert("Đã có phim này rồi này")';
											echo '</script>';
										}else{
											if(empty($_FILES['file']['tmp_name']))
											{
												$sql="Update phim set tenphim='$tenphim',dienvien='$dienvien',thongtinphim='$thongtinphim',trailer='$trailer',daodien='$daodien',thoiluongphim='$thoiluongphim',namsanxuat='$namsanxuat',noisanxuat='$noisanxuat',theloai='$theloai' where id='$id'";
												$result=$conn->query($sql);
												if($result)
												{
													header("Location: /phimhay/admin/phim.php");
												}else{
													echo '<script language="javascript">';
													echo 'alert("Sửa thất bại")';
													echo '</script>';
												}
											}else{
												move_uploaded_file($_FILES['file']['tmp_name'], '../images/'.$_FILES['file']['name']);
												$anh =$_FILES['file']['name'];
												$sql="Update phim set anhminhhoa='$anh',tenphim='$tenphim',dienvien='$dienvien',thongtinphim='$thongtinphim',trailer='$trailer',daodien='$daodien',thoiluongphim='$thoiluongphim',namsanxuat='$namsanxuat',noisanxuat='$noisanxuat',theloai='$theloai' where id='$id'";
												$result=$conn->query($sql);
												if($result)
												{
													header("Location: /phimhay/admin/phim.php");
													echo $sql;
												}else{
													echo '<script language="javascript">';
													echo 'alert("Sửa thất bại")';
													echo '</script>';
												}
											}
										}
									}else{
										echo '<script language="javascript">';
										echo 'alert("Có lỗi xảy ra")';
										echo '</script>';
									}
								}
								?>
								<form action="#" role="form" method="post" enctype="multipart/form-data">
								<table>
									<?php
										$sql="select * from theloai where id!=$row[8]";
										$result=$conn->query($sql);
										echo '<tr>
											<td><label>Thể loại</label></td>
											<td><select class="form-control" id="theloai" name="theloai">
											<option value='.$row['8'].'>'.$row['9'].'</option>';
										while($rowTL=mysqli_fetch_assoc($result))
										{
										echo		'<option value='.$rowTL['id'].'>'.$rowTL['theloai'].'</option>';
										}
										echo 	'</select>
											</td>
										</tr>';
									?>
									<tr>
										<td><label>Tên phim</label></td>
										<td><input type="text" name="tenphim" class="form-control" value="<?php echo $row[0]?>"></td>
									</tr>
									<tr>
										<td><label>Ảnh minh họa</label></td>
										<td><image width="50px" height="50px" src="../images/<?php echo $row['1']?>"/><input type="file" id="file" name="file">
									</tr>
									<tr>
										<td><label>Diễn viên </label></td>
										<td><input type="text" name="dienvien" class="form-control" value="<?php echo $row[2]?>"></td>
									</tr>
									<tr>
										<td><label>Thông tin phim </label></td>
										<td><textarea type="text" name="thongtinphim" rows="10" cols="60"><?php echo $row[3]?></textarea></td>
									</tr>
									<tr>
										<td><label>Đạo diễn </label></td>
										<td><input type="text" name="daodien" class="form-control" value="<?php echo $row[4]?>"></td>
									</tr>
									<tr>
										<td><label>Thời lượng </label></td>
										<td><input type="text" name="thoiluongphim" class="form-control" value="<?php echo $row[5]?>"></td>
									</tr>
									<tr>
										<td><label>Năm sản xuất </label></td>
										<td><input type="text" name="namsanxuat" class="form-control" value="<?php echo $row[6]?>"></td>
									</tr>
									<tr>
										<td><label>Nơi sản xuất </label></td>
										<td><input type="text" name="noisanxuat" class="form-control" value="<?php echo $row[7]?>"></td>
									</tr>
									<tr>
										<td><label>Trailer </label></td>
										<td><input type="text" name="trailer" class="form-control" value="<?php echo $row[10]?>"></td>
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
                <!-- /.row -->
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
	<script src="/phimhay/admin/js/phim.js"></script>
	<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
 <script>
  tinymce.init({
    selector: '#thongtinphim',
  });
  </script>

</body>

</html>
