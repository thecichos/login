$(document).ready(function() {
	$("#user,#loginForm,#signUpForm").children().attr('autocomplete', 'off');
	$("#loginForm").hide();
	$("#signUpForm").hide();
	$(".showUser").hide();
	$("#showUser").hide();
	$(".newPassword").hide();
	$(".user").text("not logged in");
});


function showpassword() {
	console.log($(".showUser").css('display'));
	if ($(".newPassword").css("display") == "none") {
		$(".newPassword").show();
	} else {
		$(".newPassword").hide();
	}
}

function changePassword() {
	var string = "username=" + window.sessionStorage.Username + "&oldpassword=" + $("#oldPassword").val() + "&newpassword=" + $("#newPassword").val() + "&newpasswordagain=" + $("#newPasswordAgain").val();
	$.ajax({
			url: '/users/php/Newpassword.php',
			type: 'POST',
			data: string
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

}
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

function userNo(okay) {
	if (okay == true) {
		$("#loginForm").hide();
		$("#user").hide();
		$("#signUpForm").show();
	} else {
		$("#user").hide();
		$("#signUpForm").show();
	}
}

function logIn(result) {
	window.sessionStorage.Username = result
	$('.user').text('logged in as ' + window.sessionStorage.Username)
	$('#username').val(result);
	$("#loginForm").hide();
	window.location = "/users/php/userAdmin.php";
}

function signUp(result) {
	if (result == "enter another username") {
		alert(result);
	} else {
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
	var x = [];
	$('#' + id).parent().parent().parent().children().children().children('.text').each(function() {
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
	if (window.sessionStorage !== "undefined") {
		window.sessionStorage.Username = username;
	} else {
		console.log("no support for web storage");
	}
	var string = "username=" + username + "&password=" + password;
	$.ajax({
			url: '/users/php/' + id + '.php',
			type: 'POST',
			data: string
		})
		.done(function(result) {
			if (id == "login") {
				if (result == "logged in") {
					logIn(username);
				} else {
					$(".loggedIn").text("wrong password, would you like to create a user?")
					$(".loggedIn").append("<button id='userNo' onclick='userNo(true)'>yes</button>")
				}
			} else {
				if (result == "user created") {
					signUp(result);
				} else {
					$(".loggedIn").text("username already taken")
				}
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
