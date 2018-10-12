<?php
	if (is_numeric($_GET['number']) && $_GET['number'] > 0 && $_GET['number'] == round($_GET['number'], 0)){
    $testNo =$_GET['number'];
    if ($testNo == 0){
      echo "zero is a special case, not prime.";      
    }
    elseif ($testNo == 1) {      
      echo "One is a special case, not prime.";
    }
    else {
      $isPrime = true;
    	for($i=2; $i <=$testNo/2; $i++){
        if($testNo % $i == 0) {
        	echo $testNo." is not prime.";
		      $isPrime = false;        
          break;
      	} 
      }
    }
      if ($isPrime) {
        echo $testNo. " is prime.";
	} elseif ($_GET) {
          // user has submitted somehting other than a + whole #
		echo "<p> Please enter a positive whole number.</p>";
    }
  }

?>

<p>Please enter a positive number.</p>

<form>
  <input name="number" type="text"> 
  <input type="submit" value="Determine if prime">
</form>