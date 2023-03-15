<ul class="list-film">
    <?php
    require_once('connect/db_connect.php');
    $db = new DB_Connect();
    $conn = $db->connect();
    $_get = $_GET['id'];
    $array = array(50);
    $sql = "Select phim.id,phim.tenphim,phim.anhminhhoa,phim.theloai
    ,phim.thoiluongphim,phim.namsanxuat,phim.soluotxem from phim,theloai 
    where phim.theloai=theloai.id and theloai.id=(select theloai from phim where id='$_get') limit 6";
    $result = $conn->query($sql);
    $row = mysqli_fetch_row($result);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
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
    ?>
</ul>

