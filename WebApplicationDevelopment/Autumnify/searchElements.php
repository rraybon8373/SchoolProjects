<?php
function searchElements() {
	echo "<script>
		window.onload = function(){
			Autumnify(document.body,\"background-color\");
			var elems = document.body.getElementsByTagName(\"*\");
	
			for (var i = 0; i < elems.length; i++) {
				Autumnify(elems[i],\"background-color\");
				Autumnify(elems[i],\"color\");
			}
		};
	</script>";
}