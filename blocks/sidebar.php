<div class="widget chart">
    <div class="widget-title">
        <div class="fb-page" data-href="https://www.facebook.com/PHIM-T36-118829099002342/?modal=admin_todo_tour/"
             data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="300px"
             data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/PHIM-T36-118829099002342/?modal=admin_todo_tour/"
                        class="fb-xfbml-parse-ignore">
						<a
                    href="https://www.facebook.com/PHIM-T36-118829099002342/?modal=admin_todo_tour/">PHIM T36</a>
            </blockquote>
        </div>
    </div>
</div>
<div class="widget list-category">
    <div class="widget-title">
        <div class="title">Thể loại</div>
    </div>
    <div class="widget-body">
        <ul>
            <?php
            $result = $conn->query("select * from theloai");
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <li><h3><a href="/phimhay/the-loai.php?id=<?php echo $row["id"] ?>"
                           title="<?php echo $row["theloai"] ?>"><?php echo $row["theloai"] ?></a></h3></li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="widget tagcloud">
    <div class="widget-title">
        <div class="title">Thống kê website</div>
    </div>
    <div class="widget-body">
        <ul style="text-align: center">
            <?php
            require_once 'lib/getip.php';
            $db = new DB_Connect();
            $conn = $db->connect();
            $sql = "select count(*) from phim";
            $total_phim = mysqli_fetch_row($conn->query($sql))[0];
            $tg = time();
            $tgout = 900;
            $tgnew = $tg - $tgout;
            $ip = get_client_ip();
            $sql = "delete from useronline where tgtmp < $tgnew";
            $query = $conn->query($sql);;
            $sql = "insert into useronline(tgtmp,ip,local) values('$tg','$ip','index.php')";
            $query = $conn->query($sql);
            if ($query) {
                $conn->query("Update useraccess set total_access=total_access+1");
            }
            $sql = "SELECT DISTINCT ip FROM useronline";
            $query = $conn->query($sql);
            $user = mysqli_num_rows($query);
		
            echo "<p style='color: #ffffff; font-size: 13px'>Số Bộ Phim : {$total_phim}</p>";
           	echo "<p style='color: #ffffff; margin-top: 5px; font-size: 13px'>Số Người Online : {$user}</p>";
            ?>
        </ul>
    </div>
</div>
<!-- <div class="quangcao">
    <img src="/phimhay/quang-cao/thumb_660_e01a86db-dece-43cd-af49-3aad3518bcb0.JPG" width="298px"/>
</div> -->