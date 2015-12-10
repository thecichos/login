$(document).ready(function() {
	document.getElementById('username-login').autocomplete = "off";
	document.getElementById('password-login').autocomplete = "off";
	document.getElementById('username-signUp').autocomplete = "off";
	document.getElementById('password-signUp').autocomplete = "off";
	$(".login").hide();
	$(".signUp").hide();
});

function userYes() {
	$(".user").hide();
	$(".login").show();
}

function userNo() {
	$(".user").hide();
	$(".signUp").show();
}

function test(id, bool) {
	console.log($('#' + id).parent().attr('id'));
	var x = [];
	$('#' + id).parent().children('.text').each(function() {
		if ($(this).val() == "") {

		} else {
			x.push($(this).val())
		}
	});

	if (bool = true) {
		if (id == "signUp") {
			if (x[1] == x[2]) {
				ajax(id, x[0], x[1]);
			} else {
				alert("the passwords must be the same");
			}
		} else if (id == "login") {
			ajax(id, x[0], x[1]);
		}
	}
}

function ajax(id, username, password) {
	var string = "username=" + username + "&password=" + password;
	$.ajax({
			url: 'php/'+id+'.php',
			type: 'POST',
			data: string
		})
		.done(function(result) {
			alert(result);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
}


function run() {
	$.get("php/createTable.php");
	return false;
}
