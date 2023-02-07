<?php
function autumnify() {
	echo "<script>
		function Autumnify(elem,property){
			var str = window.getComputedStyle(elem, null).getPropertyValue(property)
			var r = 0;
			var g = 0;
			var b = 0;
			var a = 0;
			var flag = false;
			if (str.charAt(3)=='a'){
				flag = true;
			}
			var pos = 1;
			var decimalflag = false;
			for (var j = 0; j < str.length; j++) {
				var c = str.charAt(j);
				if (c >= '0' && c <= '9'){
					if (pos == 1){
						r = r*10 + c.charCodeAt(0)-'0'.charCodeAt(0);
					}
					if (pos == 2){
						g = g*10 + c.charCodeAt(0)-'0'.charCodeAt(0);
					}
					if (pos == 3){
						b = b*10 + c.charCodeAt(0)-'0'.charCodeAt(0);
					}
					if (pos == 4){
						if (decimalflag==true){
							a = (c.charCodeAt(0)-'0'.charCodeAt(0))/10;
						}else{
							a = a*10 + c.charCodeAt(0)-'0'.charCodeAt(0);
						}
					}
				}
				if (c == ','){
					pos++;
				}
				if (c == \".\"){
					decimalflag = true;
				}
			}
			var Luminosity = getLuminosity(r,g,b);
			var Gradient1 = getLuminosity(253,216,161);
			var Gradient2 = getLuminosity(252,201,96);
			var Gradient3 = getLuminosity(237,85,46);
			var Gradient4 = getLuminosity(183,72,45);
			var Gradient5 = getLuminosity(172,42,42);
			var Gradient6 = getLuminosity(154,27,36);
			var Gradient7 = getLuminosity(125,48,30);
			var Gradient8 = getLuminosity(73,27,29);
			var Gradient9 = getLuminosity(52,16,16);

			if (Luminosity > (Gradient1+Gradient2)/2){
				r = 253;
				g = 216;
				b = 161;
			}else if (Luminosity > (Gradient2+Gradient3)/2){
				r = 252;
				g = 201;
				b = 96;
			}else if (Luminosity > (Gradient3+Gradient4)/2){
				r = 237;
				g = 85;
				b = 46;
			}else if (Luminosity > (Gradient4+Gradient5)/2){
				r = 183;
				g = 72;
				b = 45;
			}else if (Luminosity > (Gradient5+Gradient6)/2){
				r = 172;
				g = 42;
				b = 42;
			}else if (Luminosity > (Gradient6+Gradient7)/2){
				r = 154;
				g = 27;
				b = 36;
			}else if (Luminosity > (Gradient7+Gradient8)/2){
				r = 125;
				g = 48;
				b = 30;
			}else if (Luminosity > (Gradient8+Gradient9)/2){
				r = 73;
				g = 27;
				b = 29;
			}else{
				r = 52;
				g = 16;
				b = 16;
			}

			var colorstring;
			
			if (flag){
				colorstring = \"rgba(\" + r + \", \" + g + \", \" + b + \", \" + a + \")\";
			}else{
				colorstring = \"rgb(\" + r + \", \" + g + \", \" + b + \")\";
			}
			if (property == \"background-color\"){
				elem.style.backgroundColor = colorstring;
			}else if (property == \"color\"){
				elem.style.color = colorstring;
			}else if (property == \"border-color\"){
				elem.style.borderColor = colorstring;
			}
		}
	</script>";
}