<?php require('blocks/head.php'); ?>
	<body>
<?php require('blocks/header.php'); ?>
<?php
$active_page = '';
require('blocks/menu.php');
$db=new DB_Connect();
$conn=$db->connect();
if(isset($_POST['submit_binhluan']))
{
	if(isset($_SESSION['username']))
	{
		$id=$_SESSION['userid'];
		$_get=$_GET['id'];
		if(!empty($_POST['binhluan']))
		{
			$sql="Insert into binhluan(taikhoan,phim,binhluan) values('$id','$_get','$_POST[binhluan]')";
			$result=$conn->query($sql);
		}
	}else{
		echo "<script>";
		echo "alert('Bạn cần đăng nhập để bình luận');";
		echo "</script>";
	}
}
$_get=$_GET['id'];
$sql="Select tenphim from phim where id='$_get'";
$result=$conn->query($sql);
$rowP = mysqli_fetch_row($result);
$conn->query("UPDATE phim SET soluotxem=soluotxem+1 WHERE id='$_get'");
$resultTP=$conn->query("select * from tapphim where phim='$_get'");
if(!isset($_GET['id_ep']))
{
	$sql="select tentap,linkphim from tapphim where phim='$_get' order by id asc limit 1 ";
	$result=$conn->query($sql);
	$rowTP=mysqli_fetch_row($result);
}else{
	$sql="select tentap,linkphim from tapphim where id='$_GET[id_ep]'";
	$result=$conn->query($sql);
	$rowTP=mysqli_fetch_row($result);
}
?>
	<div class="wrapper home container">
		<div class="main">
			<div class="breadcrumb">
				<div class="item">
					<a href="/phimhay/" title="Xem phim" itemprop="url"><span itemprop="title">Xem Phim</span></a>
				</div>
				<h1 class="item last-child">
					<a title="" itemprop="url"><span title="" itemprop="title"><?php echo $rowP[0] ?></span></a>
				</h1>
			</div>
			<div class="widget list">
				<div class="widget-body">
					<div class="widget info">
						<div id="content">
							<div class="block" id="page-info">
								<div class="xemphim" id="play" style="text-align:center;">Bạn đang xem phim <font color="red"><?php echo $rowP[0] ?></font> online trên website
									<font color="red"> </font>. Chúc bạn có những phút giây giải trí vui vẻ !</div>
								<div class="play">
									<video controls width="676px" height="500px" type="video/mp4">
										<source src="<?php echo $rowTP[1]?>">
									</video>
									<!-- <iframe width="560" height="315" src="<?php echo $rowTP[1]?>" title="YouTube video player" 
										frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
									</iframe> -->
									<ul id="inlineBlock">
										<?php
										while($row=mysqli_fetch_assoc($resultTP))
										{
											echo '<a  style="padding: 10px;color:#D2990B; background:#353535; margin:0 5px;" href="/phimhay/xem-phim.php?id='.$_get.'&id_ep='.$row['id'].'">'.$row['tentap'].'</a></t>';
										}
										?>
									</ul>
								</div>
								<div class="cungchuyenmuc"><pre>
								</pre>BÌNH LUẬN</div>
								<form action="" method="post">
									<textarea  name="binhluan" cols="85" rows="4"></textarea>
									</br>
									<input name="submit_binhluan" type="submit" value="Bình luận">
								</form>
								</br>
								<?php
								$result=$conn->query("select hoten,binhluan from user,binhluan where binhluan.taikhoan=user.id and phim='$_get' order by binhluan.id desc limit 10");
								while($row=mysqli_fetch_assoc($result))
								{
									echo '<h2 style="color:#00FF33;"><b>'.$row['hoten'].'</b></h2>';
									echo '<p style="color:white;">Bình luận: '.$row['binhluan'].'</p>';
									echo '<br>';
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="widget info">
				<div class="widget-title clear-top"><div class="title up">Có thể bạn muốn xem</div></div>
				<div class="widget-body">
					<?php require('blocks/cung-chuyen-muc.php'); ?>
				</div>
			</div>
		</div>
		<div class="sidebar">
			<?php require('blocks/sidebar.php'); ?>
		</div>
	</div>
<?php require('blocks/footer.php'); ?>
