<?php require_once('connect/db_connect.php');
require_once('lib/paging.php');
$db=new DB_Connect();
$conn=$db->connect();
echo '<ul class="list-film">';
$result = mysqli_query($conn, 'select count(id) as total from phim');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$config = array(
'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
'total_record'  => $total_records,
'limit'         => 12,
'link_full'     => 'index.php?page={page}',
'link_first'    => 'index.php',
'range'         => 5
);
$paging = new Pagination();
$paging->init($config);
$start=$paging->_config['start'];
$limit=$paging->_config['limit'];
$sql="select * from phim limit $start,$limit";
$result=$conn->query($sql);
while($row=mysqli_fetch_assoc($result))
{?>
    <li>
        <div class="poster">
            <a title="<?php echo $row["tenphim"] ?>" href="/phimhay/thong-tin-phim.php?id=<?php echo $row["id"] ?>">
                <img alt="<?php echo $row["tenphim"] ?>" src="/phimhay/images/<?php echo $row["anhminhhoa"] ?>">
            </a>
            <div class="status"><?php echo $row["thoiluongphim"] ?></div>
<!--            <span class="statusbotleft">--><?php //echo date('Y',strtotime($row['namsanxuat']));?><!--</span>-->
<!--            <span class="statusbotright">--><?php //echo $row["thoiluongphim"] ?><!--</span>-->
        </div>
        <div class="name">
            <h4>
                <a title="<?php echo $row["tenphim"] ?>"
                   href="/phimhay/thong-tin-phim.php?id=<?php echo $row["id"] ?>"><?php echo $row["tenphim"] ?></a>
            </h4>
            <dfn><?php echo $row["soluotxem"] ?> views - <?php echo date('Y',strtotime($row['namsanxuat']));?></dfn>
        </div>
    </li>
<?php
}
echo '</ul>';
echo $paging->html();
?>
<link href="/phimhay/css/paging.css" rel="stylesheet">





