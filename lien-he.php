<?php require('blocks/head.php'); ?>
<body>
<?php require('blocks/header.php'); ?>
<?php
$active_page = 'lienhe';
require('blocks/menu.php');
if(isset($_POST['submit']))
{
	$db=new DB_Connect();
	$conn=$db->connect();
	$sql="Insert into gopy(hoten,email,noidung) values('$_POST[name]','$_POST[email]','$_POST[message]')";
	$conn->query($sql);
}
?>
<div class="wrapper home container">
	<div class="main">
		<div class="row">
			<div class="col-sm-12">
				<div class="contact-info">
					<h2 class="title  title-lienhe">Liên hệ</h2>
					<address style="margin-left: 30px">
						
						<p><b>Trường Đại học Hutech</b></p>
						<p>Hồ Chí Minh</p>
						<p>Mobile: 0886710370 </p>
						<p>Email: skybmt7889@gmail.com</p>
					</address>
				</div>
			</div>
			<div class="col-sm-12" style="margin-top: 20px">
				<div class="contact-form">
					<h2 class="title title-lienhe">Liên lạc</h2>
					<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="#" onsubmit="return valid()">
						<div class="form-group col-md-6">
							<input type="text" id="name" name="name" class="form-control" required="required" placeholder="Họ tên">
						</div>
						<div class="form-group col-md-6" >
							<input type="email" id="email" name="email" class="form-control" required="required" placeholder="Email">
						</div>
						<div class="form-group col-md-12">
							<textarea name="message" id="message" name="message" required="required" class="form-control" rows="8" placeholder="Góp ý"></textarea>
						</div>
						<div class="form-group col-md-12">
							<input type="submit" name="submit" class="btn btn-primary pull-right" value="SEND" onclick="sendemail()">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="sidebar">
		<?php require('blocks/sidebar.php'); ?>
	</div>
</div>
<?php require('blocks/footer.php'); ?>
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<style>
	.title-lienhe {
		padding-bottom: 10px;
	}
	address p {
		line-height: 18px;
	}
	.col-sm-12 {
		width: 90%;
	}
	.col-md-6 {
		float: left;
		width: 46%;
	}
	.col-md-12 {
		width: 99%;
	}
	.form-group {
		margin-bottom: 15px;
	}
	.form-control {
		display: block;
		width: 100%;
		padding: 6px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		color: #555;
		background-color: #fff;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
		-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	}
</style>