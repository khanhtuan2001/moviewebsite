<?php
echo '<div class="mainside">
<div id="content">
<!-- list movies random --!>
<div class="block" id="movie-recommend"> <br />
<div class="blocktitle">
<div class="icon movie2"></div>
<h2 class="title">Phim Mới Hay Nhất</h2>
<div class="divider"></div>
<div class="blockbody" id="list_movie">
<div class="list_movie">
<ul class="random">';
$connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
mysql_select_db("webphim", $connect) or die("Database not found!");
mysql_query("SET NAMES 'utf8'");
 //đoạn lệnh để phân trang
$baitrenmottrang = 10;
//lấy biến trang
if(empty($_REQUEST['page']))
$page = 0 ;
else
$page = $_REQUEST['page'];
//Lấy tổng số hàng để chia số bài trên 1 trang sẽ ra số trang	
$sodulieu = mysql_num_rows(mysql_query("select * from phim", $connect) ) or die(mysql_error());
$sotrang = $sodulieu/$baitrenmottrang;
$sql="select * from phim limit ".$page*$baitrenmottrang." , ". $baitrenmottrang;
$result=mysql_query($sql) or die(mysql_error());
while($row=mysql_fetch_array($result))
{?>
<li>
<div class="inner">
<a href="/phimhay/thong-tin-phim/<?php echo $row["id"] ?>.html" title="<?php echo $row["tenphim"] ?>">
<img width="125px" height="175px" class="khung" src="/phimhay/admin/<?php echo $row["anhminhhoa"] ?>" alt="<?php echo $row["tenphim"] ?>" />
</a>
<div>
<div class="name">
<a href="/phimhay/thong-tin-phim/<?php echo $row["id"] ?>.html" title="<?php echo $row["tenphim"] ?>"><?php echo $row["tenphim"] ?></a>
<br />
<b><font color="white"><?php echo $row["soluotxem"] ?> views | <?php echo $row["thoiluongphim"] ?></font></b>
</div>
</div>
</div>
</li>
<?php
}
echo '</ul>';
?>
<?php
echo '</div></div></div></div></div></div>';
?>