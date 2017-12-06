<?php
 include "../include/dbconn.php";
 if($_SESSION['ACCESS_TYPE']!='4'){
	header("location:../");
	die();
	}
?>
<!DOCTYPE html>
<html>
<title>AROS</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="images/logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" type="text/css" href="../google/fafa.css">
<link rel="stylesheet" type="text/css" href="../js/jquery.min.js">
<link rel="stylesheet" type="text/css" href="../js/jquery.js">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<style>
.bar-item:hover{
	border-bottom:2px solid #fff !important;
}
.w3-bar-item{
	border-bottom:2px solid #9c27b0 !important;
}
@media screen and (min-width: 1025px) {
	/*For High Resolution Computers*/
   .left_menu_container, .putahe_container, .order_container{
	  border-right:1px solid #ddd;
	  max-height:565px;
	  min-height:565px;
	  overflow-y:auto;
   }
   #putahe_img{
	   margin:0px 20px;
   }
}
@media screen and (min-width: 668px) and (max-width: 1024px) {
	/*For ipad*/
   .left_menu_container, .putahe_container, .order_container{
	   border-right:1px solid #ddd;
	   max-height:673px;
	   min-height:673px;
	  overflow-y:auto;
   }
}
@media screen and (min-width:569px) and (max-width: 667px) {
	/*For iphone 6*/
   .left_menu_container{
	   font-size:12px;
	   border-right:1px solid #ddd;
	   max-height:280px;
	   min-height:280px;
	   overflow-y:auto;
   }
}
@media screen and (min-width:768px) and (max-height:575px){
	/*Medium Screens*/
	.left_menu_container, .putahe_container, .order_container{
	   font-size:10px;
	   border-right:1px solid #ddd;
	   max-height:479px;
	   min-height:479px;
	   overflow-y:auto;
   }
   #putahe_img{
	  
   }
   #list_of_orders{
   }
}
body {
    height: 100vh !important;
}

</style>
<script language="javascript" type="text/javascript">
$(document).ready(function () {
$(window).on('load resize', function () {
	  var w = $(window).width();
	  if (w <= 768 && w >= 601) {
		  $('#list_of_orders').removeClass('w3-quarter');
		  $('#list_of_orders').addClass('w3-hide');
		  $('#center_putahe').removeClass('w3-half');
		  $('#center_putahe').removeClass('w3-rest');
		  // alert(w);
		  var preferredHeight = 768;
			//Base font size for the page
			var fontsize = 18;

			var displayHeight = $(window).height();
			var percentage = displayHeight / preferredHeight;
			var newFontSize = Math.floor(fontsize * percentage) - 1;
		  $('#add_order_btn').css("font-size",newFontSize);
		}
		else {
		 // alert(w);
		  $('#list_of_orders').removeClass('w3-hide');
		  $('#list_of_orders').addClass('w3-quarter');
		  $('#center_putahe').addClass('w3-half');
		  $('#center_putahe').addClass('w3-rest');
		  $('#add_order_btn').css('font-size','12px');
		}
});
});
function order_list(){
	$('#list_of_orders').removeClass('w3-hide w3-animate-right w3-hide-small ');
	$('#center_putahe').addClass('w3-hide-small w3-hide-medium');
	$('#orderListBtn').addClass('w3-hide');

	//return true;
}
function order_list_rev(){
	$('#list_of_orders').addClass('w3-hide w3-animate-right w3-hide-small ');
	$('#center_putahe').removeClass('w3-hide-small w3-hide-medium');
	$('#orderListBtn').removeClass('w3-hide');

	//return true;
}
	
$(function() {

    var $sidebar   = $("#orderListBtn"), 
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 50;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });
    
});
	
$(window).bind('scroll', function () {
	var scrolled = $(window).scrollTop();
	//alert(scrolled);
    if ($(window).scrollTop() > 50) {
		
        $('#menu_bar').addClass('w3-top');
    } else {
        $('#menu_bar').removeClass('w3-top');
    }
});
</script>
<body >
<!---------TOP NAV ------>
	<div class="w3-row">
		<div class="banner w3-container">
			<div><h2 class="w3-wide" style="margin-bottom:0px;"><strong class="w3-text-purple " style="text-shadow:1px 1px 0 #444">AROS</strong> <small class="w3-right w3-hide-medium w3-hide-small">Automated Restaurant Ordering System</small></h2>
			
			</div>
		</div>
		<div class="w3-row" id="menu_bar" >
			<div class="w3-row" style=''>
				<div class="w3-bar w3-purple w3-card-2" >
				  <a href="#" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small">Christorey Opao</a>
				  <a href="#" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-medium w3-hide-large"><i class="fa fa-user fa-1x"></i></a>
				  <div class="w3-dropdown-hover w3-hide-medium w3-hide-large">
					  <button class="w3-button">MENU CATEGORY <i class="fa fa-caret-down fa-lg"></i></button>
					  <div class="w3-dropdown-content w3-bar-block w3-border">
						<a href="#" class="w3-bar-item w3-button w3-small">PASTA</a>
						<a href="#" class="w3-bar-item w3-button w3-small">PIZZA</a>
						<a href="#" class="w3-bar-item w3-button w3-small">COMBO MEAL</a>
					  </div>
					</div>
				  <a href="logout.php" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small w3-right">Logout</a>
				</div>
			</div>
		</div>
	</div>
<!---------TOP NAV ------>



<!--------- MEnu Container ------>
	<div class="w3-row">
		<!--- Side Menu List -->
		<div class="w3-quarter w3-container w3-padding left_menu_container w3-bar-block w3-hide-small">
			<h3 class="w3-hide-small w3-hide-medium"><strong class="w3-border-bottom">Menu Categories</strong></h3>
			<strong class="w3-border-bottom w3-hide-large">Menu Categories</strong>
			 <div class="w3-block">
				<a href="#" class="w3-bar-item w3-button">Pizza</a>
				<a href="#" class="w3-bar-item w3-button">Pasta</a>
				<a href="#" class="w3-bar-item w3-button">Combo Meals</a>
			</div>
		</div>
		<!--- Side Menu List -->
		
		<!--- PUTAHE Container -->
		<div class="w3-half putahe_container w3-padding" id="center_putahe">
			<div class="w3-row-padding">
				<div class="w3-third" >
					<div class="w3-row">
						<div style="border:1px dashed #909090;padding:0px 20px; margin-top:5%" >
							<div class="">
								<p style="font-size:1.2em;text-align:"><i><strong>Chicken Sisig</strong></i></p>
							</div>
							<div style="height:100%; width:100%">
							  <img src="../images/sisig.jpg" width="100%"/>
								<div class="w3-purple w3-text-shadow" style="width: 100%;text-align: center;padding: 5px 0;text-shadow:1px 1px 0 #444">&#x20B1; 2,000.00</div>
							</div>
							<div class="" style="position:relative;top:7px">
								<button class="w3-btn w3-teal w3-block add_order_btn" id="">Add to Orders</button>
							</div>
						</div>
					</div>
				</div>
				<div class="w3-third" >
					<div class="w3-row">
						<div style="border:1px dashed #909090;padding:0px 20px; margin-top:5%" >
							<div class="">
								<p style="font-size:1.2em;text-align:"><i><strong>Chicken Sisig</strong></i></p>
							</div>
							<div style="height:100%; width:100%">
							  <img src="../images/sisig.jpg" width="100%"/>
								<div class="w3-purple w3-text-shadow" style="width: 100%;text-align: center;padding: 5px 0;text-shadow:1px 1px 0 #444">&#x20B1; 2,000.00</div>
							</div>
							<div class="" style="position:relative;top:7px">
								<button class="w3-btn w3-teal w3-block">Add to Orders</button>
							</div>
						</div>
					</div>
				</div>
				<div class="w3-third" >
					<div class="w3-row">
						<div style="border:1px dashed #909090;padding:0px 20px; margin-top:5%" >
							<div class="">
								<p style="font-size:1.2em;text-align:"><i><strong>Chicken Sisig</strong></i></p>
							</div>
							<div style="height:100%; width:100%">
							  <img src="../images/sisig.jpg" width="100%"/>
								<div class="w3-purple w3-text-shadow" style="width: 100%;text-align: center;padding: 5px 0;text-shadow:1px 1px 0 #444">&#x20B1; 2,000.00</div>
							</div>
							<div class="" style="position:relative;top:7px">
								<button class="w3-btn w3-teal w3-block">Add to Orders</button>
							</div>
						</div>
					</div>
				</div>
				<div class="w3-third" >
					<div class="w3-row">
						<div style="border:1px dashed #909090;padding:0px 20px; margin-top:5%" >
							<div class="">
								<p style="font-size:1.2em;text-align:"><i><strong>Chicken Sisig</strong></i></p>
							</div>
							<div style="height:100%; width:100%">
							  <img src="../images/sisig.jpg" width="100%"/>
								<div class="w3-purple w3-text-shadow" style="width: 100%;text-align: center;padding: 5px 0;text-shadow:1px 1px 0 #444">&#x20B1; 2,000.00</div>
							</div>
							<div class="" style="position:relative;top:7px">
								<button class="w3-btn w3-teal w3-block">Add to Orders</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--- PUTAHE Container -->
		
		<!--- PUTAHE Container -->
		<div class="w3-hide-large w3-right" >
			<a href="javascript:void(0);" style="position:absolute;z-index:9999999;top:25%;right:20px;" class="w3-btn w3-small w3-teal w3-hover-opacity" id="orderListBtn" onclick="order_list()"><i class="fa fa-list-ol"></i></a>
		</div>
		
		<div class="w3-quarter w3-hide-small order_container w3-padding" id="list_of_orders">
			<h3 class="w3-hide-small w3-hide-medium"><strong class="w3-border-bottom">Orders:</strong></h3>
			<strong class="w3-border-bottom w3-hide-large">Orders</strong><a href="javascript:void(0);" class="w3-hide-large w3-right" onclick="order_list_rev()" style="text-decoration:none;">X</a>
			<ul class="w3-ul w3-hoverable">
			  <li>Order #1  <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			  <li>Order #1  <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			  <li>Order #1  <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			  <li>Order #1  <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			  <li>Order #1  <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			  <li>Order #1  <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			  <li>Order #1  <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			  <li>Order #1  <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			  <li>Order #1  <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			</ul>
		</div>
		<!--- PUTAHE Container -->
		
	</div>
<!--------- MEnu Container ------>

</body>
</html>
>>>>>