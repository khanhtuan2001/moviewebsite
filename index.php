<?php require('blocks/head.php'); ?>
<body>
<?php require('blocks/header.php'); ?>
<?php
$active_page = 'home';
require('blocks/menu.php');
?>
<div class="widget hotest">
    <div class="container">
        <?php require('slide/slider.php'); ?>
    </div>
</div>
<div class="wrapper home container">
    <div class="main">
        <div class="widget update">
            <div class="widget-title">
                <h3 class="title"><b>Phim đề xuất cho bạn: </b></h3>
            </div>
            <div class="widget-body">
                <?php require('the-loai/phim-hay.php'); ?>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <?php require('blocks/sidebar.php'); ?>
    </div>
</div>
<?php require('blocks/footer.php'); ?>