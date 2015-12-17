$(document).ready(function() {
	$(".fun").hide();
});
var haha = new Konami();
haha.code = function () {
	$(".fun").show();
}
haha.load();
var i = 1;
var ip = 100;
var m = 1;
var mp = 100;
var Incre = 0;
var Increp = 10;
var z = 100;
if ($(".fun").css('display') != "none") {
		setInterval(fun, 1000 - Incre * m)
}
function fun() {
	var x = Number(document.getElementById('fun').value);
	x = x + i * m;
	if (x > z) {
		z = z * z;
	}
	document.getElementById('fun').value = Math.floor(x);
	document.getElementById('i').value = Math.floor(i);
	document.getElementById('m').value = Math.floor(m);
	document.getElementById('z').value = Math.floor(z);
	document.getElementById('incre').value = Math.floor(Incre);
	document.getElementById('ip').value = Math.floor(ip);
	document.getElementById('mp').value = Math.floor(mp);
	document.getElementById('increp').value = Math.floor(Increp);
}

function funi() {
	if (Number(document.getElementById('fun').value) < ip) {
		alert("not enough number");
	} else {
		i = i + i;
		document.getElementById('fun').value = Number(document.getElementById('fun').value) - ip;

		ip = ip + ip / 4
	}
}

function funm() {
	if (Number(document.getElementById('fun').value) < mp) {
		alert("not enough number");
	} else {
		m = m * 1.5;
		document.getElementById('fun').value = Number(document.getElementById('fun').value) - mp;

		mp = mp + mp / 2
	}
}
function funIncre() {
	if (Number(document.getElementById('fun').value) < Increp) {
		alert("not enough number");
	} else {
		Incre = Incre + 1;
		document.getElementById('fun').value = Number(document.getElementById('fun').value) - Increp;

		Increp = Increp * Increp / 2
	}
}
