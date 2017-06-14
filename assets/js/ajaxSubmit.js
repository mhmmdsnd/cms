//Login & Register
$(document).ready(function(){
 $('#action').click(function(e) {
		login();
		e.preventDefault();		
    });
$('#sign').click(function(e) {
		member();
		e.preventDefault();
});
});

function login () {
	hideshow('loading',1);
	error(0);
	
	$.ajax({
		type : "POST",
		url : "http://localhost/cms/login/check_database",
		data: {loginname : $('#loginname').val(), password : $('#password').val()},
		dataType : "json",
		success : function(data){
			if(parseInt(data.status)==1)
			{
				window.location="http://localhost/cms/cpanel/";
			}
			else if(parseInt(data.status)==0)
			{
				error(1,data.message);
			}
			
			hideshow('loading',0);
		}
	});	
}

//function member
function member () {
	hideshow('loading',1);
	error(0);

	$.ajax({
		type : "POST",
		url : "http://localhost/cms/member/check_database",
		data: {loginname : $('#loginname').val(), password : $('#password').val(), Id : $('#Id').val()},
		dataType : "json",
		success : function(data){
			if(parseInt(data.status)==1)
			{
				if(parseInt(data.productId) == 99999) {
					window.location="http://localhost/cms/order/";
				}
					else {
					window.location="http://localhost/cms/order/create/"+data.productId;
				}

			}
			else if(parseInt(data.status)==0)
			{
				error(1,data.message);
			}

			hideshow('loading',0);
		}
	});
}

function hideshow(el,act)
{
	if(act) $('#'+el).css('visibility','visible');
	else $('#'+el).css('visibility','hidden');
}

function error(act,txt)
{
	hideshow('error',act);
	if(txt) 
	{
		$('#error').addClass("alert alert-danger");
		$('#error').html(txt);
	}
}