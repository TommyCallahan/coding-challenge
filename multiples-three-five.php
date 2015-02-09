<?php

$i=1;					// The count starting point

while($i <= 100) { 		// The loop - limit 100

	$thenumber = $i; 	// Declaring the count value as a variable

		if (($thenumber % 3 == 0) && ($thenumber % 5 == 0))		// If the count value divided by 3 and 5 is a whole number print "three-five"
		  {  echo "three-five<br>";}

		else if ($thenumber % 3 == 0) 							// If the count value divided by 3 is a whole number print "three"
		  {  echo "three <br>";}

		else if ($thenumber % 5 == 0)							// If the count value divided by 5 is a whole number print "five"
		  {  echo "five <br>";}

		else
		  {  echo $thenumber . "<br>";}							// If the count value divided by 3 or 5 is not a whole number print the number value

	$i++;														// Increase the number on each iteration through the loop

} 


?>