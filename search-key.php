<!-- style -->

<style>
	span.blue {color: #7ec0ee;}
	td.blue {background-color: #7ec0ee;}
	td {padding: 5px; text-align: center; border: 1px solid #ccc;}
</style>

<?php
 
 // The array

$sounders = array
	(
	"dempsey" => array
	(
		"number" => 2,	    
		"age" => 31,	    
		"goals" => 15
	),
	
	"evans" => array
	(
		"number" => 3,	    
		"age" => 29,	    
		"goals" => 1    
	),
	
	"alonso" => array
	(
		"number" => 6,	    
		"age" => 29,	    
		"goals" => 0	    
	),
	
	"martins" => array
	(
		"number" => 9,	    
		"age" => 30,	    
		"goals" => 17,
		"assists" => 5	    
	)
);

?>

<!-- reference table -->

<table>   
	
	<tr>
		<td>Sounders</td>
		<td class="blue">number</td>
		<td class="blue">age</td>
		<td class="blue">goals</td>
	</tr>
	
	<tr>
		<td class="blue">dempsey</td>
		<td><?php echo $sounders['dempsey']['number']; ?></td>
		<td><?php echo $sounders['dempsey']['age']; ?></td>
		<td><?php echo $sounders['dempsey']['goals']; ?></td>
	</tr>
	
	<tr>
		<td class="blue">evans</td>
		<td><?php echo $sounders['evans']['number']; ?></td>
		<td><?php echo $sounders['evans']['age']; ?></td>
		<td><?php echo $sounders['evans']['goals']; ?></td>
	</tr>
	
	<tr>
		<td class="blue">alonso</td>
		<td><?php echo $sounders['alonso']['number']; ?></td>
		<td><?php echo $sounders['alonso']['age']; ?></td>
		<td><?php echo $sounders['alonso']['goals']; ?></td>
	</tr>
	
	<tr>
		<td class="blue">martins</td>
		<td><?php echo $sounders['martins']['number']; ?></td>
		<td><?php echo $sounders['martins']['age']; ?></td>
		<td><?php echo $sounders['martins']['goals']; ?></td>
	</tr>
</table>

<p>Legend: Array keys are in <span class="blue">blue</span></p>


<!-- Search submission form -->

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
Key to search:
<input type="text" name="key"><br>
<input type="submit">
</form>



<?php

error_reporting(E_ERROR | E_PARSE);	//hides warnings




function findKey($array, $keySearch) {		
	foreach ($array as $key => $item){ 		// searches top level array for key (dempsey,evans,alonso,martins)
		if ($key == $keySearch){
			echo 'Key exists';				// if key exists in array show success message
			exit;
		}
	else 
		{
		if (isset($array[$key]))		
			findKey($array[$key], $keySearch); // if other arrays exist, start the function over and look for the key
		}
	}
	return false;		//end function when all arrays have been searched or key is found
}


// Run the function to search for specific key in array.


if (findKey($sounders, $_GET["key"]) == false){  	
	echo 'Key does not exist';				// show key does not exist if it is not found in any array
} else {									
	findKey($sounders, $_GET["key"]);
}




?>