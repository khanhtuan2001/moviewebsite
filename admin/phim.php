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
                                <i class="fa fa-table"></i> Danh sách
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-md-12 col-md-offset-3">
						<div class="col-lg-12 ">
							<div class="alert alert-success" id="alert-success-top" ></div>
							 <form id="formsanpham" method="post" enctype="multipart/form-data">
								<table>
									<tr>
									<?php
									require_once '../connect/db_connect.php';
									require_once '../lib/paging.php';
									$db=new DB_Connect();
									$conn=$db->connect();
									$sql="select * from theloai";
									$result=$conn->query($sql);
									echo '<tr>
										<td><label>Thể loại</label></td>
										<td><select class="form-control" id="theloai" name="theloai">';
									while($row=mysqli_fetch_assoc($result))
									{
									echo		'<option value='.$row['id'].'>'.$row['theloai'].'</option>';
									}
									echo 	'</select>
										</td>
									</tr>';
									?>
									<tr>
										<td><label>Tên phim</label></td>
										<td><input type="text" id="tenphim" class="form-control"></td>
									</tr>
									<tr>
										<td><label>Ảnh minh họa</label></td>
										<td><input type="file" id="file" name="file"></td>
									</tr>
									<tr>
										<td><label>Diễn viên </label></td>
										<td><input type="text" id="dienvien" class="form-control"></td>
									</tr>
									<tr>
										<td><label>Thông tin phim </label></td>
										<td><textarea type="text" id="thongtinphim" rows="10" cols="60"></textarea></td>
									</tr>
									<tr>
										<td><label>Đạo diễn </label></td>
										<td><input type="text" id="daodien" class="form-control"></td>
									</tr>
									<tr>
										<td><label>Thời lượng </label></td>
										<td><input type="text" id="thoiluongphim" class="form-control"></td>
									</tr>
									<tr>
										<td><label>Năm sản xuất </label></td>
										<td><input type="text" id="namsanxuat" class="form-control"></td>
									</tr>
									<tr>
										<td><label>Nơi sản xuất </label></td>
										<td><input type="text" id="noisanxuat" class="form-control"></td>
									</tr>
									<tr>
										<td><label>Trailer </label></td>
										<td><input type="text" id="trailer" class="form-control"></td>
									</tr>
									<tr>
										<td></td>
										<td><button type="button" class="btn btn-sm btn-success" onclick="add()">OK</button>
										<button type="reset" class="btn btn-sm btn-warning">Reset</button></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
										<th>Mã phim</th>
										<th>Ảnh</th>
                                        <th>Tên phim</th>
                                        <th>Số lượt xem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$result = mysqli_query($conn, 'select count(id) as total from phim');
									$row = mysqli_fetch_assoc($result);
									$total_records = $row['total'];
									$config = array(
										'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
										'total_record'  => $total_records,
										'limit'         => 10,
										'link_full'     => 'phim.php?page={page}',
										'link_first'    => 'phim.php',
										'range'         => 10 
									);
									$paging = new Pagination();	 
									$paging->init($config);
									$start=$paging->_config['start'];
									$limit=$paging->_config['limit'];
									$sql="select phim.id,tenphim,anhminhhoa,soluotxem,theloai.theloai from phim,theloai where phim.theloai=theloai.id order by phim.id desc limit $start,$limit";
									$result=$conn->query($sql);
									while($row=mysqli_fetch_assoc($result))
									{
									echo '
                                    <tr>
										<td class="col-md-1">'.$row['id'].'</td>
										<td class="col-md-1"><image width="90px" height="90px" src="../images/'.$row['anhminhhoa'].'"</td>
                                        <td class="col-md-1">'.$row['tenphim'].'</td>
										<td class="col-md-2">'.$row['soluotxem'].'</td>
										<td class="col-md-1"><input type="image" src="/phimhay/images/icons/del.gif" onclick="del('.$row['id'].')"/></td>
										<td class="col-md-1"><input type="image" src="/phimhay/images/icons/edit.png" onclick="edit('.$row['id'].')"/></td>
										<td class="col-md-1"><input type="image" src="/phimhay/images/icons/add.png" onclick="add_episode('.$row['id'].')"/></td>
                                    </tr>';
									}
									echo $paging->html();
									?>
                                </tbody>
                            </table>
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
</body>

</html>
