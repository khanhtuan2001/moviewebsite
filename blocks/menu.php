<div id="menu">
    <ul class="container">
        <li class="<?php echo isset($active_page) && $active_page === 'home' ? 'active' : '' ?> home"><a href="/phimhay">TRANG CHỦ</a></li>
        <li class="<?php echo isset($active_page) && $active_page === 'gioithieu' ? 'active' : '' ?>"><a href="/phimhay/gioi-thieu.php">GIỚI THIỆU</a></li>
        <li class="<?php echo isset($active_page) && $active_page === 'lienhe' ? 'active' : '' ?>"><a href="/phimhay/lien-he.php">LIÊN HỆ</a></li>
        <?php 
          if(isset($_SESSION['userid'])){
        ?>
        <li class="<?php echo isset($active_page) && $active_page === 'napcard' ? 'active' : '' ?>"><a href="/phimhay/napcard.php">Nạp Card</a></li>
        <?php 
          }
        ?>
    </ul>
</div>