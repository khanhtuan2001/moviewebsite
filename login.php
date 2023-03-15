<?php require('blocks/head.php'); ?>
    <body>
<?php require('blocks/header.php'); ?>
<?php
$active_page = 'home';
require('blocks/menu.php');
?>

    <div class="wrapper home container">
        <div class="main">
            <div align="center">
                <form action="" method="post">
              <h2 class="title title-lienhe">Đăng nhập</h2>
					<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="#" onsubmit="return valid()">
						<div>
							Tài khoản <input type="text" name="username" placeholder="Tài khoản"  style="margin-top:10px; height:30px; border-radius:4px;">
						</div>
						<div  >
							Mật khẩu <input type="password" name="password" placeholder="Mật khẩu" style="margin-top:10px; height:30px; border-radius:4px;">
						</div>
						
						<div >
							<input type="submit" name="submit" value="Đăng nhập"  style = "  margin-top:20px;height: 30px; width:100px; border-radius:4px; background: #f3b61c;">
						</div>
                </form>
            </div>
            <?php
            $db=new DB_Connect();
            $conn=$db->connect();
            if (isset($_POST["submit"])) {
			//xu li chong sqlinjection
			$username = trim($_POST['username']);
			 $username = strip_tags($username);
			 $username = htmlspecialchars($username);
			  
			 $password = trim($_POST['password']);
			 $password = strip_tags($password);
			 $password = htmlspecialchars($password);
			
			//xu li xss
				$username=htmlentities($username);
				$password=htmlentities($password);
			    $password = md5($password);
			
                $result = $conn->query("select * from user where taikhoan='" . $username . "' and matkhau='" . $password . "';");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_row($result);
                    $_SESSION['userid'] = $row[0];
                    $_SESSION['username'] = $row[1];
                    header("Location: /phimhay/index.php");
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Sai thông tin")';
                    echo '</script>';
                }
            }
            ?>
        </div>
        <div class="sidebar">
            <?php require('blocks/sidebar.php'); ?>
        </div>
    </div>
<?php require('blocks/footer.php'); ?>
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
</style