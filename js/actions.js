// JavaScript Document
function logmein(){
	var username=$("#username").val();
	var password=$("#password").val();
	
	if(username ==""){
		$("#loginFormCon").effect("shake");
		$("#loading_on_login").show().html("<div class='w3-panel w3-red w3-padding'>Enter a Username.</div>");
		setTimeout(function(){$("#loading_on_login").hide("slow");},2000);
		document.getElementById("username").focus();
		return false;
	}else if(password==""){
		$("#loginFormCon").effect("shake");
		$("#loading_on_login").show().html("<div class='w3-panel w3-red w3-padding'>Enter a Password.</div>");
		setTimeout(function(){$("#loading_on_login").hide("slow");},2000);
		document.getElementById("password").focus();
		return false;
	}else{
		var data="username="+username+"&password="+password;
		$.ajax({
			type: "POST",
			url: "include/actions.php",
			data: data,
			success: function(data){
				console.log(data);
				if(data == "1"){
					location="admin/";
				}else if(data == "2"){
					location="cashier/";
				}else if(data == "3"){
					location="cook/";
				}else if(data == "4"){
					location="waiter/";
				}
				else if(data=="ERROR"){
					$("#loginFormCon").effect("shake");
					$("#loading_on_login").show().html("<div class='w3-panel w3-red w3-padding'>ACCESS DENIED!</div>");
					setTimeout(function(){$("#loading_on_login").hide("slow");},2000);
					document.getElementById("password").focus();
				}
			}
		});
	}
}
///////////////////////////////
function addCategory(){
	var categoryName=$("#categoryname").val();
	if(categoryName==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Category Name.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("categoryname").focus();
	}
	else{
		$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data: "categoryName="+categoryName,
			success: function(data){
				console.log(data);
				if(data=="SUCCESS"){
					$("#alertMSG").show().html("<div class='w3-panel w3-green w3-padding'><b>SUCCESS!</b> Category Name has been added.</div>");
					setTimeout(function(){$("#alertMSG").hide("slow");},2000);
					setTimeout(function(){location.reload();},3000);
				}
			}
		});
	}
}
///////////////////////////////
function addMenu(){
	var menuname=$("#menuname").val();
	var catId=$("#catID").val();
	var menuprice=$("#menuprice").val();
	var menuimage=$("#menuimage").val();
}
///////////////////////////////
function addTable(){
	var tablenumber=$("#tablenumber").val();
	if(tablenumber==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Table Number.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("tablenumber").focus();
	}else{
		$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data: "tableNum="+tablenumber,
			success: function(data){
				console.log(data);
				if(data=="SUCCESS"){
					$("#alertMSG").show().html("<div class='w3-panel w3-green w3-padding'><b>SUCCESS!</b> Table Number has been added.</div>");
					setTimeout(function(){$("#alertMSG").hide("slow");},2000);
					setTimeout(function(){location.reload();},3000);
				}
			}
		});
	}
}
//////////////////////////////////
function addWaiter(){
	var name=$("#waitername").val();
	var surname=$("#waitersurname").val();
	var username=$("#waiterusername").val();
	var password=$("#waiterpassword").val();
	if(name==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Name of the waiter.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("waitername").focus();
	}else if(surname==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Surname of the waiter.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("waitersurname").focus();
	}else if(username==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Username.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("waiterusername").focus();
	}else if(password==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Password.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("waiterpassword").focus();
	}else{
		$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data: "waitName="+name+"&waitSurname="+surname+"&waitUsername="+username+"&waitPassword="+password,
			success: function(data){
				console.log(data);
				if(data=="SUCCESS"){
					$("#alertMSG").show().html("<div class='w3-panel w3-green w3-padding'><b>SUCCESS!</b> Waiter has been added.</div>");
					setTimeout(function(){$("#alertMSG").hide("slow");},2000);
					setTimeout(function(){location.reload();},3000);
				}
			}
		});
	}
}



//adding menu
function add_menu(){
	var fd = new FormData();
	var file_data = $('#menuimage').get(0).files[0];
	var cat_id = $('#catID').val();
	var menu_name = $('#menuname').val();
	var menu_price = $('#menuprice').val();
	fd.append('new_menu_img',file_data);
	fd.append('menu_cat_id',cat_id);
	fd.append('new_menu_name',menu_name);
	fd.append('menu_price',menu_price);

	
	$.ajax({
		url:"../include/actions.php",
		type:'post',
		cache:false,
		contentType:false,
		processData:false,
		data:fd,
		beforeSend:function(){
			
		},
		success:function(data){
			console.log(data);
			if(data=="SUCCESS"){
				$("#alertMSG").fadeIn('slow').html("<div class='w3-panel w3-green w3-padding'><b>SUCCESS!</b> Waiter has been added.</div>");
				setTimeout(function(){$("#alertMSG").hide("fast");},2000);
				setTimeout(function(){location.reload();},3000);
			}else if(data == "DUPLICATE"){
				$("#alertMSG").fadeIn('slow').html("<div class='w3-panel w3-blue w3-padding'><b>DUPLICATE FOUND</b> Entry already exists in database.</div>");
				setTimeout(function(){$("#alertMSG").hide("fast");},2000);
				setTimeout(function(){location.reload();},3000);
			}else{
				$("#alertMSG").fadeIn('slow').html("<div class='w3-panel w3-red w3-padding'><b>ERROR!</b> Please try again.</div>");
				setTimeout(function(){$("#alertMSG").hide("fast");},2000);
				setTimeout(function(){location.reload();},3000);
			}
		}
	});

}