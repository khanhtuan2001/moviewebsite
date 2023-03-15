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
                    <li >
                        <a href="phim.php"><i class="fa fa-fw fa-table"></i> Phim</a>
                    </li>
					<li>
                        <a href="user.php"><i class="fa fa-fw fa-table"></i> User</a>
                    </li>
					<li class="active">
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
                                <i class="fa fa-dashboard"></i>  Admin
                            </li>
                            <li >
                                <i class="fa fa-table"></i> Slider
                            </li>
							<li class="active">
                                <i class="fa fa-table"></i> Danh sách
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-md-6 col-md-offset-4">
						<div class="col-lg-12 ">
							<div class="alert alert-success" id="alert-success-top" ></div>
							<form id="formslider" method="post" enctype="multipart/form-data">
								<table>
									<?php
									require_once '../connect/db_connect.php';
									require_once '../lib/paging.php';
									$db=new DB_Connect();
									$conn=$db->connect();
									$sql="select * from phim";
									$result=$conn->query($sql);
									echo '<tr>
										<td><label>Phim</label></td>
										<td><select class="form-control" id="phim" name="phim">';
									while($row=mysqli_fetch_assoc($result))
									{
									echo		'<option value='.$row['id'].'>'.$row['tenphim'].'</option>';
									}
									echo 	'</select>
										</td>
									</tr>';
									?>
									<tr>
										<td><label>Ảnh minh họa</label></td>
										<td><input type="file" id="file" name="file"></td>
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
                                        <th class="col-md-1">Ảnh</th>
                                        <th class="col-md-3">Phim</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php								  
									$result = mysqli_query($conn, 'select count(id) as total from slider');
									$row = mysqli_fetch_assoc($result);
									$total_records = $row['total'];
									$config = array(
										'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
										'total_record'  => $total_records,
										'limit'         => 10,
										'link_full'     => 'slider.php?page={page}',
										'link_first'    => 'slider.php',
										'range'         => 10 
									);
									$paging = new Pagination();	 
									$paging->init($config);
									$start=$paging->_config['start'];
									$limit=$paging->_config['limit'];
									$sql="select slider.id,anh,tenphim from phim,slider where phim.id=slider.phim limit $start,$limit";
									$result=$conn->query($sql);
									while($row=mysqli_fetch_assoc($result))
									{
									echo '
                                    <tr>
                                        <td class="col-md-1"><image width="30px" height="30px" src="../images/'.$row['anh'].'"</td>
                                        <td class="col-md-3">'.$row['tenphim'].'</td>
										<td style="width:10%"><input type="image" src="/phimhay/images/icons/del.gif" onclick="del('.$row['id'].')"/></td>
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
	<script src="/phimhay/admin/js/slider.js"></script>
</body>

</html>
