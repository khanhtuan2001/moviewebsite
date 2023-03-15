<?php require('blocks/head.php'); ?>
<body>
<?php require('blocks/header.php'); ?>
<?php
$active_page = '';
require('blocks/menu.php');
require_once('lib/paging.php');

if($_GET['tukhoa']!="") {
    $db = new DB_Connect();
    $conn = $db->connect();
    $sql = "select * from phim where tenphim like '%{$_GET['tukhoa']}%' or dienvien like '%{$_GET['tukhoa']}%' or daodien like '%{$_GET['tukhoa']}%' or namsanxuat like '%{$_GET['tukhoa']}%'";
    $result = $conn->query($sql);
}
?>
<div class="wrapper home container">
    <div class="main">
        <div class="widget update">
            <div class="breadcrumb">
                <div class="item">
                    <a href="/phimhay/" title="Xem phim" itemprop="url"><span itemprop="title">Kết Quả Tìm Kiếm Từ Khóa</span></a>
                </div>
                <h1 class="item last-child">
                    <a title="" itemprop="url"><span title="" itemprop="title"><?php echo $_GET['tukhoa'] ?></span></a>
                </h1>
            </div>
            <div class="widget-body">
                <ul class="list-film">
                    <?php if(isset($result) && count($result) > 0) { ?>
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
                    <?php } ?>
                    <?php } else { ?>
                        <h3>Không có kết quả tìm kiếm</h3>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <?php require('blocks/sidebar.php'); ?>
    </div>
</div>
<?php require('blocks/footer.php'); ?>
<link href="/phimhay/css/paging.css" rel="stylesheet">
