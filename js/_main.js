$(document).ready(function() {
	$("#user,#loginForm,#signUpForm").children().attr('autocomplete', 'off');
	$("#loginForm").hide();
	$("#signUpForm").hide();
	$(".showUser").hide();
	$("#showUser").hide();

	$(".user").text("not logged in");
});
// setInterval(changeColor, 1000);
//
// function changeColor() {
// 	var d = new Date();
// 	var h = Math.floor(Math.floor(Math.floor(d.getHours() / 24 * 255) / 4) * 4);
// 	var m = Math.floor(Math.floor(Math.floor(d.getMinutes() / 60 * 255) / 4) * 4);
// 	var s = Math.floor(Math.floor(Math.floor(d.getSeconds() / 60 * 255) / 4) * 4);
// 	console.log(h + "," + m + "," + s);
// 	var temph = h;
// 	var tempm = m;
// 	var temps = s;
// 	$("#time").animate({
// 		backgroundColor: 'rgb(' + h + ',' + m + ',' + s + ')'
// 	}, 500);
// 	$("#time").css('background-color', 'rgb(' + temph + ',' + tempm + ',' + temps + ')')
//
// }

function userYes() {
	$("#user").hide();
	$("#loginForm").show();
}

function userNo() {
	$("#user").hide();
	$("#signUpForm").show();
}

function logIn(result) {
	$('.user').text('logged in as ' + result)
	$('#username').val(result);
	$("#loginForm").hide();
	$("#showUser").show();
}

function signUp(result) {
	if (result == "enter another username") {
		alert(result);
	} else {
		alert("you signed up as " + result);
		$("#loginForm").show();
		$("#signUpForm").hide();
	}
}

function showUser() {
	console.log($(".showUser").css('display'));
	if ($(".showUser").css("display") == "none") {
		$(".showUser").show();
		$("#showUser").text("collapse user menu");

	} else {
		$(".showUser").hide();
		$("#showUser").text("expand user menu");
	}
}

function test(id, bool) {
	console.log($('#' + id).parent().attr('id'));
	var x = [];
	$('#' + id).parent().children('.text').each(function() {
		if ($(this).val() == "") {
			alert("enter something in " + $(this).attr('id'));
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
	var x = "*"
	console.log(id, username, password.replace(/[A-Z a-z 0-9]/g, x));
	var string = "username=" + username + "&password=" + password;
	$.ajax({
			url: 'php/' + id + '.php',
			type: 'POST',
			data: string
		})
		.done(function(result) {
			if (id == "login") {
				logIn(result);
			} else {
				signUp(result);
			}
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
