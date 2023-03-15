<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='https://v2.zopim.com/?67O6aYlhYlWGqXtBrLPZ5F0ZKlQH56Mg';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zendesk Chat Script-->

<div id="footer">
    <div class="container">
        <div class="row">
            <div class="left">
                <div class="widget-title">
                    <div class="title">Thể loại phim</div>
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
            <div class="right">

                <ul class="column-links">
                    <h5>Liên Kết</h5>
                    <ul>
                        <li><a href="/phimhay/gioi-thieu.php">Giới thiệu</a></li>
                        <li><a href="/phimhay/lien-he.php">Liên hệ</a></li>
                    </ul>
                </ul>
                <ul class="column-links">
                    <h5>Kết Nối</h5>
                    <ul>
                        <ul>
                            <li><a href="https://www.facebook.com/T36-Subbing-Team-267035693942169/" title="facebook">Facebook</a></li>
                            <li><a href="https://www.youtube.com/channel/UC3RWyPEzL5UqT4jDoCcCOTw" title="youtube">Youtube</a></li>
                        </ul>
                    </ul>
                </ul>
                <ul class="column-links">
                    <h5>Liên Hệ</h5>
                    <ul>
						<li><!--email_off--><b  </b><!--/email_off--></li>
                        <li><!--email_off--><!--/email_off--></li>
                    
						 <li><!--email_off-->Forever Friends<!--/email_off--></li>
                    </ul>
                </ul>
            </div>
        </div>
        <div class="links">
            <div class="powered"> . All Rights Reserved.</div>
        </div>
    </div>
</div>
</body>
</html>