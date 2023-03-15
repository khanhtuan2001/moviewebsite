



<?php require('blocks/head.php'); ?>
<body>
<?php require('blocks/header.php'); ?>
<?php
$active_page = '';
require('blocks/menu.php');
require_once('lib/paging.php');

$id = $_GET["id"];
$result = $conn->query("select count(phim.id) as total,theloai.theloai as theloai from phim,theloai where phim.theloai=theloai.id and theloai.id='$id'");
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$theloai = $row['theloai'];
$config = array(
    'current_page' => isset($_GET['page']) ? $_GET['page'] : 1,
    'total_record' => $total_records,
    'limit' => 8,
    'link_full' => 'the-loai.php?page={page}&id=' .$id,
    'link_first' => 'the-loai.php?id=' .$id,
    'range' => 5
);
$paging = new Pagination();
$paging->init($config);
$start = $paging->_config['start'];
$limit = $paging->_config['limit'];
$sql = "select * from phim where theloai='$id' limit $start,$limit";
$result = $conn->query($sql);
?>
<div class="wrapper home container">
    <div class="main">
        <div class="widget update">
            <div class="breadcrumb">
                <div class="item">
                    <a href="/phimhay/" title="Xem phim" itemprop="url"><span itemprop="title">Xem Phim</span></a>
                </div>
                <h1 class="item last-child">
                    <a title="" itemprop="url"><span title="" itemprop="title"><?php echo $theloai ?>
                            Có <?php echo $total_records; ?> Phim</span></a>
                </h1>
            </div>
            <div class="widget-body">
                <ul class="list-film">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <li>
                            <div class="poster">
                                <a title="<?php echo $row["tenphim"] ?>"
                                   href="/phimhay/thong-tin-phim.php?id=<?php echo $row["id"] ?>">
                                    <img alt="<?php echo $row["tenphim"] ?>"
                                         src="/phimhay/images/<?php echo $row["anhminhhoa"] ?>">
                                </a>
                                <div class="status"><?php echo $row["thoiluongphim"] ?></div>
                            </div>
                            <div class="name">
                                <h4>
                                    <a title="<?php echo $row["tenphim"] ?>"
                                       href="/phimhay/thong-tin-phim.php?id=<?php echo $row["id"] ?>"><?php echo $row["tenphim"] ?></a>
                                </h4>
                                <dfn><?php echo $row["soluotxem"] ?> views
                                    - <?php echo date('Y', strtotime($row['namsanxuat'])); ?></dfn>
                            </div>
                        </li>
                        <?php
                    }
                    echo '</ul>';
                    echo $paging->html();
                    ?>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <?php require('blocks/sidebar.php'); ?>
    </div>
</div>
<?php require('blocks/footer.php'); ?>
<link href="/phimhay/css/paging.css" rel="stylesheet">
