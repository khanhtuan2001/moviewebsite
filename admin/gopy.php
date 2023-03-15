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
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <b class="caret"></b></a>
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
                    <li class="active">
                        <a href="theloai.php"><i class="fa fa-fw fa-table"></i> Thể loại</a>
                    </li>
                    <li >
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
                            <li class="active">
                                <i class="fa fa-table"></i> Thống kê
                            </li>
                        </ol>
                    </div>
                </div>
				<?php
					require_once '../connect/db_connect.php';
					require_once '../lib/paging.php';
					$db=new DB_Connect();
					$conn=$db->connect();
					$tg=time();
					$tgout=900;
					$tgnew=$tg - $tgout;
					$sql="delete from useronline where tgtmp < $tgnew";
					$query=$conn->query($sql);
					$sql="SELECT DISTINCT ip FROM useronline";
					$query=$conn->query($sql);
					$user = mysqli_num_rows($query);
					$sql="select total_access as total from useraccess";
					$query=$conn->query($sql);
					$total_access = mysqli_fetch_assoc($query);
					$total=$total_access['total'];
					echo "<h2 style='color:green'>Số người online:$user</h2>";
					echo "<h2 style='color:green'>Tổng số lượt truy cập:$total</h2>";
				?>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
						<h2 align="center" style="color:red">Các Góp ý của người xem </h2>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
										<th>ID</th>
										<th>Họ tên</th>
										<th>Email</th>
										<th>Nội dung</th>
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$sql="select id,hoten,email,noidung  from gopy";
									$result=$conn->query($sql);
									while($row=mysqli_fetch_array($result))
									{
									echo '
                                    <tr>
                                        <td class="col-md-1">'.$row['id'].'</td>
                                        <td class="col-md-1">'.$row['hoten'].'</td>									
										<td class="col-md-1">'.$row['email'].'</td>
										<td class="col-md-1">'.$row['noidung'].'</td>
										<td class="col-md-1"><input type="image" src="/phimhay/images/icons/del.gif" onclick="del('.$row['id'].')"/></td>
									</tr>';
									}
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
	<script src="/phimhay/admin/js/gopy.js"></script>

</body>

</html>
