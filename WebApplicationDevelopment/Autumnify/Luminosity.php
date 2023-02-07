<?php
function luminosity() {
	echo "<script>
		function getLuminosity(R,G,B){
			R = R/255;
			G = G/255;
			B = B/255;
			L1 = 0;
			L2 = 0;
			L3 = 0;

       			if (R <= .03928){
            			L1=R/12.92;
        		}else{
            			L1=Math.pow(((R+0.055)/1.055),2.4);
        		}
       			if (G <= .03928){
            			L2=G/12.92;
        		}else{
            			L2=Math.pow(((G+0.055)/1.055),2.4);
        		}
       			if (B <= .03928){
            			L3=B/12.92;
        		}else{
            			L3=Math.pow(((B+0.055)/1.055),2.4);
        		}

    			return 0.2126 * L1 + 0.7152 * L2 + 0.0722 * L3;
		}
	</script>";
}