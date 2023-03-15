<?php require('blocks/head.php'); ?>
    <body>
<?php require('blocks/header.php'); ?>
<?php
$active_page = '';
require('blocks/menu.php');
$_get=$_GET['id'];
$sql="Select phim.id,phim.tenphim,phim.anhminhhoa,phim.dienvien,phim.thongtinphim,phim.daodien,phim.trailer,phim.thoiluongphim,phim.namsanxuat,phim.noisanxuat,phim.tags,phim.soluotxem, theloai.theloai from phim,theloai where phim.theloai=theloai.id and phim.id='$_get'";
$result=$conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>
    <div class="wrapper home container">
        <div class="main">
            <div class="breadcrumb">
                <div class="item">
                    <a href="/phimhay/" title="Xem phim" itemprop="url"><span itemprop="title">Xem Phim</span></a>
                </div>
                <h1 class="item last-child">
                    <a title="" itemprop="url"><span title="" itemprop="title"><?php echo $row["tenphim"] ?></span></a>
                </h1>
            </div>
            <div class="widget list">
                <div class="widget-body">
                    <div class="widget info">
                        <div id="media">
                            <div class="media main-controls">
                                <div class="thumb">
                                    <img src="/phimhay/images/<?php echo $row["anhminhhoa"] ?>" alt="Rocketman - Rocketman">
                                </div>
                                <div class="details" itemscope="" itemtype="http://schema.org/Movie">
                                    <h1 itemprop="name"><a href="http://www.vtv16.com/phim/rocketman-6493" title="Phim Rocketman">Tên Phim: <?php echo $row["tenphim"] ?></a></h1>
                                    <dl>
                                        <dt>Đạo diễn :</dt> <dd style="color:#FFED00"><?php echo $row["daodien"] ?></dd>
                                        <dt>Diễn viên :</dt> <dd style="color:red"><?php echo $row["dienvien"] ?></dd>
                                        <dt>Nơi sản xuất :</dt> <dd><a href="http://www.vtv16.com/quoc-gia/phim-au-my" title="Phim Âu Mỹ"><?php echo $row["noisanxuat"] ?></a></dd>
                                        <dt>Năm sản xuất :</dt> <dd><a href="http://www.vtv16.com/the-loai/phim-am-nhac" title="Phim Âm Nhạc"><?php echo date('Y',strtotime($row['namsanxuat'])); ?></a></dd>
                                        <dt>Thời lượng :</dt> <dd><a href="http://www.vtv16.com/ho-so/dexter-fletcher" title="Dexter Fletcher"><?php echo $row["thoiluongphim"] ?></a></dd>
                                        <dt>Lượt xem :</dt> <dd><?php echo $row["soluotxem"] ?></dd>
                                        <dt>Thể loại :</dt> <dd><?php echo $row["theloai"] ?></dd>
                                    </dl>
                                    <h4 class="play">
                                        <li class="item-xem-phim">
                                            <?php
                                            if(isset($_SESSION['userid'])){
                                            $id_user=$_SESSION['userid'];
                                           

                                                $sql_userid_packet = mysqli_query($conn,"SELECT * FROM muagoi where userid = $id_user");
                                                if(mysqli_num_rows($sql_userid_packet)>0){
                                                ?>
                                            <a id="btn-film-watch" class="btn btn-red" title="<?php echo $row["tenphim"] ?>" href="/phimhay/xem-phim.php?id=<?php echo $row["id"] ?>">Xem phim</a>
                                                <?php
                                                } else {
                                                    ?>
                                                     <a id="btn-film-watch" class="btn btn-red" onclick="alert('vui lòng mua gói');" href="./packet.php">Xem phim</a>
                                                    <?php
                                                }
                                            }else {
                                                ?>
                                                     <a id="myBtn" class="btn btn-primary"  href="./login.php">Vui lòng đăng nhập</a>
                                                    <?php
                                            }
                                            ?>
                                        </li>
                                        <?php if(isset($row["trailer"])) {  ?>
                                        <li class="item-xem-phim">
                                            <button id="myBtn" class="btn btn-primary" title="<?php echo $row["tenphim"] ?>">Trailer</button>
                                        </li>
                                        <?php }  ?>
                                    </h4>
                                    <!-- Trigger/Open The Modal -->
                                    <?php if(isset($row["trailer"])) {  ?>
                                    <link href="/phimhay/assets/css/modal.css" rel="stylesheet">
                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <span class="close">&times;</span>
                                                <h2>Trailer</h2>
                                            </div>
                                            <div class="modal-body">
                                                <iframe width="560" height="315" src="<?php echo $row["trailer"] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget info">
                <div class="widget-title clear-top">
                    <div class="tabs" data-target=".widget-body .content">
                        <div class="tab active" data-name="content"><span>Thông Tin Chi Tiết Bộ Phim</span></div>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="content" data-name="content">
                        <div id="pagetext" data-min-height="300">
                            <?php echo $row["thongtinphim"] ?>
                        </div>
                        <div class="keywords">
                            Từ khóa: <a href="http://www.vtv16.com/tag" title=""></a> <?php echo $row["tags"] ?>
                        </div>
                    </div>
                </div>
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
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<?php require('blocks/footer.php'); ?>

