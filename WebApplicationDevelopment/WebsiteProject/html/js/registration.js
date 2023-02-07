//document.addEventListener('DOMContentLoaded', () => {
window.addEventListener("load", function() {

	function changeBackground(element, color) {
		element.style.backgroundColor = color;
	};

	elements = document.querySelectorAll('input');
	elements.forEach(function(element) {
		element.addEventListener('focus', (event) => {
			changeBackground(event.target, "#ccffff");
		});

		element.addEventListener('blur', (event) => {
			changeBackground(event.target, "white");
			if (event.target.id == "firstname" || event.target.id == "lastname") {
				event.target.value = event.target.value.charAt(0).toUpperCase() + event.target.value.slice(1);
			}
		});
	});

	document.getElementById("reset").addEventListener("click", function() {
		fields = document.querySelectorAll("input");

		for (i = 0; i < fields.length; i++) {
			fields[i].value = null;
		}
	});

	document.getElementById("sampleForm").addEventListener("submit",checkForEmptyFields);

	document.getElementById("airquality").value = localStorage.getItem("airquality");
	localStorage.removeItem("airquality");
	
	function checkForEmptyFields(e){
		cssSelector = "input[type=text],input[type=password],input[type=list]";
		fields = document.querySelectorAll(cssSelector);

		fieldList = [];
		for (i = 0; i < fields.length; i++) {
			if (fields[i].value == null || fields[i].value == "") {
				e.preventDefault();
				fieldList.push(fields[i]);
			}
		}
		emailflag = checkEmail();
		passwordflag = checkPassword();
		radioflag = checkRadios();
		if (fieldList.length == 0 && emailflag == true && passwordflag == true && radioflag == true) {
			document.getElementById("submitConfirmation").innerHTML = "Info submitted!";
			alert("Registration processed!");
		}else{
			msg = "The following fields can't be empty: ";
			e.preventDefault();
			for (i=0; i<fieldList.length; i++){
				msg+= fieldList[i].id + ",";
			}
			if (fieldList.length > 0){
				alert(msg);
			}
		}
	}

	function checkEmail() {
		var email = document.getElementById('email');
		var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (!filter.test(email.value)) {
			if (email.value != null && email.value != ""){
				alert('Please provide a valid email address');
			}
			email.focus;
			return false;
		}
		return true;
	}
	
	function checkPassword() {
		var password = document.getElementById('password');
		var filter = /^(?=.*\d)(?=.*[0-9])[a-zA-Z0-9]{6,16}$/;
		if (!filter.test(password.value)) {
			if (password.value != null && password.value != ""){
				alert('Please provide a valid password: Between 6-20 characters, must contain a number');
			}
			password.focus;
			return false;
		}
		return true;
	}

	function checkRadios() {
		var radios = document.getElementsByName("airsub");
		
		for (i = 0; i < radios.length; i++) {
			if (radios[i].checked) {
				return true;
			}
		}
		
		alert('Please choose a subscription option');
		return false;
	}
});
