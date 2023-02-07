window.addEventListener("load", function() {

	document.getElementById("prod1regbtn").addEventListener("click", function() {
		localStorage.setItem("airquality","50% Purity");
	});

	document.getElementById("prod2regbtn").addEventListener("click", function() {
		localStorage.setItem("airquality","80% Purity");
	});

	document.getElementById("prod3regbtn").addEventListener("click", function() {
		localStorage.setItem("airquality","100% Purity");
	});
});