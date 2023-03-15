<?php
               session_start();
               require_once('connect/db_connect.php');
               require_once('lib/paging.php');
               $db=new DB_Connect();
               $conn=$db->connect();
?>
<style>
    /*
Inspired by the dribble shot http://dribbble.com/shots/1285240-Freebie-Flat-Pricing-Table?list=tags&tag=pricing_table
*/

/*--------- Font ------------*/
@import url(https://fonts.googleapis.com/css?family=Droid+Sans);
@import url(http://weloveiconfonts.com/api/?family=fontawesome);
/* fontawesome */
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}
* {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
/*------ utiltity classes -----*/
.fl{ float:left; }
.fr{ float: right; }
/*its also known as clearfix*/
.group:before,
.group:after {
    content: "";
    display: table;
} 
.group:after {
    clear: both;
}
.group {
    zoom: 1;  /*For IE 6/7 (trigger hasLayout) */
}

body {
    background: #F2F2F2;
    font-family: 'Droid Sans', sans-serif;
    line-height: 1;
    font-size: 16px;    
}

.pricing-table {
    width: 80%;
    margin: 50px auto;
    text-align: center;
    padding: 10px;
    padding-right: 0;
}
.pricing-table .heading{
    color: #9C9E9F;
    text-transform: uppercase;
    font-size: 1.3rem;
    margin-bottom: 4rem;
}
.block{
    width: 30%;    
    margin: 0 15px;
    overflow: hidden;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;    
/*    border: 1px solid red;*/
}
/*Shared properties*/
.title,.pt-footer{
    color: #FEFEFE;
    text-transform: capitalize;
    line-height: 2.5;
    position: relative;
}
.content{
    position: relative;
    color: #FEFEFE;
    padding: 20px 0 10px 0;
}
/*arrow creation*/
.content:after, .content:before,.pt-footer:before,.pt-footer:after {
	top: 100%;
	left: 50%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}
.pt-footer:after,.pt-footer:before{
    top:0;
}
.content:after,.pt-footer:after {
	border-color: rgba(136, 183, 213, 0);	
	border-width: 5px;
	margin-left: -5px;
}
/*/arrow creation*/
.price{
    position: relative;
    display: inline-block;
    margin-bottom: 0.625rem;
}
.price span{    
    font-size: 6rem;
    letter-spacing: 8px;
    font-weight: bold;        
}
.price sup{
    font-size: 1.5rem;    
    position: absolute;    
    top: 12px;
    left: -12px;
}
.hint{
    font-style: italic;
    font-size: 0.9rem;
}
.features{
    list-style-type: none;    
    background: #FFFFFF;
    text-align: left;
    color: #9C9C9C;
    padding:30px 22%;
    font-size: 0.9rem;
}
.features li{
    padding:15px 0;
    width: 100%;
}
.features li span{
   padding-right: 0.4rem; 
}
.pt-footer{
    font-size: 0.95rem;
    text-transform: capitalize;
}
/*PERSONAL*/
.personal .title{        
    background: #78CFBF;    
}
.personal .content,.personal .pt-footer{
    background: #82DACA;
}
.personal .content:after{	
	border-top-color: #82DACA;	
}
.personal .pt-footer:after{
    border-top-color: #FFFFFF;
}
/*PROFESSIONAL*/
.professional .title{
    background: #3EC6E0;
}
.professional .content,.professional .pt-footer{
    background: #53CFE9;
}
.professional .content:after{	
	border-top-color: #53CFE9;	
}
.professional .pt-footer:after{
    border-top-color: #FFFFFF;
}
/*BUSINESS*/
.business .title{
    background: #E3536C;
}
.business .content,.business .pt-footer{
    background: #EB6379;
}
.business .content:after{	
	border-top-color: #EB6379;	
}
.business .pt-footer:after {	
	border-top-color: #FFFFFF;	
}
</style>
<body>
    <div class="wrapper">
        <!-- PRICING-TABLE CONTAINER -->
        <div class="pricing-table group">
            <h1 class="heading">
                Gói cước cho hội viên
            </h1>
            <!-- PERSONAL -->
            <div class="block personal fl">
                <h2 class="title">gói bạc</h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                        <span>30000</span>
                        <sub>vnd</sub>
                    </p>
                    <p class="hint">1 tháng</p>
                </div>
                <!-- /CONTENT -->
                <!-- FEATURES -->
                <ul class="features">
                <li><span class="fontawesome-cog"></span>1 tháng trải nghiệm</li>
                    <li><span class="fontawesome-star"></span>chỉ bằng 1 cốc cà phê</li>
                    <li><span class="fontawesome-dashboard"></span>Unlimited Data Transfer</li>
                    <li><span class="fontawesome-cloud"></span>20GB Local Storage</li>
                </ul>
                <!-- /FEATURES -->
                <!-- PT-FOOTER -->
                <div class="pt-footer">
                <?php
 
                 $id_user=$_SESSION['userid'];
                 $sql_userid_packet = mysqli_query($conn,"SELECT * FROM user where id = $id_user");
                 $row= mysqli_fetch_array($sql_userid_packet);
                     if($row['tiennap']>=30000){
                                                ?>
                    <a href="./packet/xulygoi.php?value=1">Mua</a>
                    <?php }
                    else 
                    {
                        ?>
                        <a href="./NapCard.php" onclick="alert('khong du tien vui long nap them')">Mua</a>
                        <?php
                    }?>
                </div>
                <!-- /PT-FOOTER -->
            </div>
            <!-- /PERSONAL -->
            <!-- PROFESSIONAL -->
            <div class="block professional fl">
                <h2 class="title">gói vàng</h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                        <span>160000</span>
                        <sub>vnd</sub>
                    </p>
                    <p class="hint">6 tháng</p>
                </div>
                <!-- /CONTENT -->
                <!-- FEATURES -->
                <ul class="features">
                    <li><span class="fontawesome-cog"></span>6 tháng xem phim thả ga</li>
                    <li><span class="fontawesome-star"></span>giảm hẳn 20000 vnd</li>
                    <li><span class="fontawesome-dashboard"></span>Unlimited Data Transfer</li>
                    <li><span class="fontawesome-cloud"></span>20GB Local Storage</li>
                </ul>
                <!-- /FEATURES -->
                <!-- PT-FOOTER -->
                <div class="pt-footer">
                <?php
 
                   $id_user=$_SESSION['userid'];
                 $sql_userid_packet = mysqli_query($conn,"SELECT * FROM user where id = $id_user");
                 $row= mysqli_fetch_array($sql_userid_packet);
                     if($row['tiennap']>=160000){
                                                ?>
                    <a href="./packet/xulygoi.php?value=2">Mua</a>
                    <?php }
                    else 
                    {
                        ?>
                        <a href="./NapCard.php" onclick="alert('không đủ tiền vui lòng nạp thêm')">Mua</a>
                        <?php
                    }?>
                </div>
                <!-- /PT-FOOTER -->
            </div>
            <!-- /PROFESSIONAL -->
            <!-- BUSINESS -->
            <div class="block business fl">
                <h2 class="title">gói bạch kim</h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                        <span>300000</span>
                        <sub>vnd</sub>
                    </p>
                    <p class="hint">1 năm</p>
                </div>
                <!-- /CONTENT -->

                <!-- FEATURES -->
                <ul class="features">
                <li><span class="fontawesome-cog"></span>12 tháng xem phim tuyệt vời</li>
                    <li><span class="fontawesome-star"></span>giảm hẳn 60000 vnd</li>
                    <li><span class="fontawesome-dashboard"></span>Unlimited Data Transfer</li>
                    <li><span class="fontawesome-cloud"></span>20GB Local Storage</li>
                </ul>
                <!-- /FEATURES -->

                <!-- PT-FOOTER -->
                <div class="pt-footer">
                <?php
 
                 $id_user=$_SESSION['userid'];
                 $sql_userid_packet = mysqli_query($conn,"SELECT * FROM user where id = $id_user");
                 $row= mysqli_fetch_array($sql_userid_packet);
                     if($row['tiennap']>=300000){
                                                ?>
                    <a href="./packet/xulygoi.php?value=3">Mua</a>
                    <?php }
                    else 
                    {
                        ?>
                        <a href="./NapCard.php" onclick="alert('khong du tien vui long nap them')">Mua</a>
                        <?php
                    }?>
                </div>
                <!-- /PT-FOOTER -->
            </div>
            <!-- /BUSINESS -->
        </div>
        <!-- /PRICING-TABLE -->
    </div>
</body>