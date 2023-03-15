<?php require('blocks/head.php'); ?>
    <body>
<?php require('blocks/header.php'); ?>
<?php
$active_page = 'home';
require('blocks/menu.php');
?>

  
  
                    
    <div class="wrapper home container">
        <div class="main">
            <div >
                <form action="" method="post">
				<table align="center">
				<tr>
					<td><b>Họ tên :</b></td>
					<td><input type="text" name="hoten" style="margin-top:10px; height:30px;  border-radius:4px;"></td>
					<td> <span style="color:red">*Thông tin bắt buộc</span></td>
				  </tr>
                  <tr>

					<td><b>Tài khoản:</b></td>
					<td><input type="text" name="taikhoan" style="margin-top:10px; height:30px;  border-radius:4px;"></td>
					<td> <span style="color:red">*Thông tin bắt buộc</span></td>
				  </tr>
				  <td> </td>
				 
				    <tr>
					<td><b> Mật khẩu:</b></td>
					<td><input type="password" name="matkhau" style="margin-top:10px; height:30px;  border-radius:4px;"></td>
					<td> <span style="color:red" >*Thông tin bắt buộc (tối thiểu 8 và phải có viết hoa, thường và chữ số)</span></td>
				  </tr>
				  
				
				    <tr>
					<td><b> SĐT:</b></td>
					<td><input type="text" name="sdt" style="margin-top:10px; height:30px;  border-radius:4px;"></td>
				
				  </tr>
				  
				  <tr>
				  
				  	<td><b> Email:</b></td>
					<td><input type="email" name="email" style="margin-top:10px; height:30px;  border-radius:4px;"></td>
					<td> <span style="color:red">*Thông tin bắt buộc</span></td>
				  </tr>
				   
				  <tr>
				  	<td><b> Địa chỉ:</b></td>
					
					<td> <input type="text" name="diachi" style="margin-top:10px; height:30px; border-radius:4px;"></td>
				  </tr>
				   
				 
				</table>
				<pre>
				</pre>
				<div align="left">
                       <input type="submit" name="register" value=" Đăng ký "style="margin-left:70px;height: 30px; width:100px; border-radius:4px; background: #f3b61c;">
                    </div>
                </form>
            </div>
            <?php
            $db=new DB_Connect();
            $conn=$db->connect();
            
			if(isset($_POST['register']))
            {	
			$hoten=($_POST['hoten']);
			$taikhoan = $_POST['taikhoan'];
			$matkhau=$_POST['matkhau'];
			$sdt= ($_POST['sdt']);
			$email= ($_POST['email']);
		
		
           
				if($taikhoan=="") {
					echo "hãy nhập tài khoản ";
				}

			   else if($matkhau=="") {
					echo "nhập  mật khấu";
				}
				 else if($hoten=="") {
					echo "hãy nhập họ tên đầy đủ";
				}
				else if(strlen($matkhau)<8 || ctype_upper($matkhau) ||  ctype_lower($matkhau) || !preg_match("#[0-9]+#", $matkhau) )
					{
						echo "Hãy nhập mat khau tối thiểu 8 kí tự, có đủ kí tự viết hoa và viết thường và chữ số ";
					}


				 
				 else if($email=="") {
					echo "hãy nhập địa chỉ mail";
			     }
			 
			 else{
                $sql="select * from user where taikhoan='$_POST[taikhoan]' or email='$_POST[email]'";
                $result=$conn->query($sql);
                if(mysqli_num_rows($result)>0)
                {
                    echo "<script>";
                    echo "alert('Tài khoản đã tồn tại')";
                    echo "</script>";
                }else{
				$matkhau = trim($_POST['matkhau']);
				$matkhau = strip_tags($matkhau);
				$matkhau= htmlspecialchars($matkhau);
			// Ma hoa MD5
				$matkhau = md5($matkhau);
		
                    $sql="Insert into user(hoten,taikhoan,matkhau,email,sdt,diachi) values('$_POST[hoten]','$_POST[taikhoan]','".$matkhau."','$_POST[email]','$_POST[sdt]','$_POST[diachi]')";
                    $result=$conn->query($sql);
                    if($result)
                    {
                        echo "<script>";
                        echo "alert('Đăng ký thành công')";
                        echo "</script>";
                    }else{
                        echo "<script>";
                        echo "alert('Đăng ký thất bại')";
                        echo "</script>";
                    }
                }
            }}
            ?>
        </div>
        <div class="sidebar">
            <?php require('blocks/sidebar.php'); ?>
        </div>
    </div>
<?php require('blocks/footer.php'); ?>