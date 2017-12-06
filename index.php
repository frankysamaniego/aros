<?php
	include "include/dbconn.php";
?>
<!DOCTYPE html>
<html>
<title>AROS</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="images/logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="google/fafa.css">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('images/bg.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
</style>
<body>


<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
 
  <div class="w3-display-middle w3-card-4 w3-padding-large" >
	 <h2><i class="fa fa-unlock fa-fx"></i> Login<hr style="margin-top:0px; min-width:300px"></h2>
      <div class="w3-container w3-padding-16" id="loginFormCon">
		<div class="w3-container" id="loading_on_login"></div>
		<form class="w3-form" id="login_form" method="" action="">
			<div class="w3-padding-16" style="position:relative;">
				<span class="fa fa-user fa-lg w3-text-black "style="position:absolute;left:10px;top:40%;z-index:99999;"></span>
				<input class="w3-input w3-medium w3-round w3-opacity" style="padding-left: 30px;" type="text" id="username" name="username" placeholder="Username" required>
			</div>
			<div class="w3-padding-16" style="position:relative;">
				<span class="fa fa-lock fa-lg w3-text-black "style="position:absolute;left:10px;top:40%;z-index:99999;"></span>
				<input class="w3-input w3-medium w3-round w3-opacity" style="padding-left: 30px;" type="password" id="password" name="password" placeholder="Password" required>
			</div>
			<div class="w3-padding-16" style="position:relative;">
				<button class="w3-btn w3-btn-block w3-btn-small w3-teal w3-hover-opacity" type="button" onClick="logmein()"> <span class="w3-wide"><i class="fa fa-sign-in fa-lg"></i> Login</span></button>
			</div>
		</form>
    </div>
  </div>
</div>

</body>
<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/jquery-ui.js" ></script>  
<script type="application/javascript" src="js/actions.js"></script>
</html>
