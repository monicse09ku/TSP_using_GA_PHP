<!--

--------Functions--------
##suffle
For Generating permutated array from the initial array to create initial population.
##asort
to sort all the arrays in ascending order according to total distance.
##rand
Used for generation a random number as distance from node to node ranging from 10-90
##in_array
For checking whether a value exists in the given array 

--------Variables--------
$initialPopulation--Array, consisting of initial population value
$updatedPopulation--The Updated Population after crossover
$totalDistance--Array of the total distances of the chromosomes
$sortedTotalDistance--Sorted total distance array in ascending order
$bestDistance--The best distance in an iteration
$finalDistance--The distance after completing the iterations
$finalPopulation--The chromosome after completing the iterations
$constantOne--First half of a chromosome
$variantOne--The Last half of a chromosome
-->


<?php
error_reporting (E_ALL ^ E_NOTICE); /* 1st line (recommended) */
$array = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14);
$finalDistance = 909090;

/*initial population creation*/
for($i = 0; $i<10 ; $i++){
	shuffle($array);
	$initialPopulation[] = $array;
	
}

/*distance allocation*/
for($i = 0; $i<14 ; $i++){
	for($j = 0; $j<14 ; $j++){
		if($i == $j){
			$distance[$i][$j] = 0;
		}else{
			$distance[$i][$j] = rand(10, 90);
		}
	}
	
}

/*distance allocation*/
echo '<h3>Distance Matrix</h3>';
for($i = 0; $i<14 ; $i++){
	for($j = 0; $j<14 ; $j++){
		echo $distance[$i][$j];
		echo ' | ';
	}
	echo '</br>';
	
}


for($iteration = 0; $iteration < 50; $iteration++){

$updatedPopulation = array();
$totalDistance = array();
$sortedTotalDistance = array();
$index = array();
$bestDistance = array();

/*total distance calculation*/
for($i = 0; $i<10 ; $i++){
	$total = 0;
	for($j = 1; $j<14 ; $j++){
		$total = $total + $distance[$initialPopulation[$i][$j]][$initialPopulation[$i][$j+1]];
	}
	$totalDistance[] = $total;
}


foreach($totalDistance as $totalDistances){
	$sortedTotalDistance[] = $totalDistances;
}

asort($sortedTotalDistance);

foreach($sortedTotalDistance as $sortedTotalDistances){
	$bestDistance[] = $sortedTotalDistances;
	for($j = 0; $j<10 ; $j++){
		if($totalDistance[$j] == $sortedTotalDistances){
			$index[] = $j;
		}

	}
}

foreach($index as $indexs){
	$updatedPopulation[] = $initialPopulation[$indexs];
}


/*result shown*/

echo '<h1>For Iteration ' . $iteration . '</h1>';


for($i = 0; $i<10 ; $i++){
	for($j = 0; $j<14 ; $j++){
	echo $updatedPopulation[$i][$j] . '->';
	}
	echo 'Distance:';
	print_r($bestDistance[$i]);
	echo '</br>';
}


echo '<h4>Best Population:</h4>';
for($i = 0; $i<14 ; $i++){
echo $updatedPopulation[0][$i] . '->';
}
echo 'Distance:';
print_r($bestDistance[0]);
echo '</br>';

if($bestDistance[0] < $finalDistance){
	$finalDistance = $bestDistance[0];
	$finalPopulation = $updatedPopulation[0];
}

$initialPopulation = array();
$constantOne = array();
$constantTwo = array();
$variantOne = array();
$variantTwo = array();
$constantThree = array();
$constantFour = array();
$variantThree = array();
$variantFour = array();
$constantFive = array();
$constantSix = array();
$variantFive = array();
$variantSix = array();
$constantSeven = array();
$constantEight = array();
$variantSeven = array();
$variantEight = array();
$constantNine = array();
$constantTen = array();
$variantNine = array();
$variantTen = array();

/* crossover */
for($i = 0; $i<7 ; $i++){
	$constantOne[] = $updatedPopulation[0][$i];
	$constantTwo[] = $updatedPopulation[1][$i];
}

for($i = 7; $i<14 ; $i++){
	$variantOne[] = $updatedPopulation[0][$i];
	$variantTwo[] = $updatedPopulation[1][$i];
}

/*choromosome one*/
foreach($variantTwo as $variantTwos){
	if(in_array($variantTwos, $constantOne)){
		$constantOne[] = 0;
	}else{
		$constantOne[] = $variantTwos;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantOne)){
		
	}else{
		$toChangeOne[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantOne[$i] == 0){
		$constantOne[$i] = $toChangeOne[$j];
		$j++;
	}
}
$initialPopulation[] = $constantOne;

/*choromose two*/
foreach($variantOne as $variantOnes){
	if(in_array($variantOnes, $constantTwo)){
		$constantTwo[] = 0;
	}else{
		$constantTwo[] = $variantOnes;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantTwo)){
		
	}else{
		$toChangeTwo[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantTwo[$i] == 0){
		$constantTwo[$i] = $toChangeTwo[$j];
		$j++;
	}
}

/*three and four*/
$initialPopulation[] = $constantTwo;

for($i = 0; $i<7 ; $i++){
	$constantThree[] = $updatedPopulation[2][$i];
	$constantFour[] = $updatedPopulation[3][$i];
}

for($i = 7; $i<14 ; $i++){
	$variantThree[] = $updatedPopulation[2][$i];
	$variantFour[] = $updatedPopulation[3][$i];
}
/*choromosome three*/
foreach($variantFour as $variantFours){
	if(in_array($variantFour, $constantThree)){
		$constantThree[] = 0;
	}else{
		$constantThree[] = $variantFours;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantThree)){
		
	}else{
		$toChangeThree[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantThree[$i] == 0){
		$constantThree[$i] = $toChangeThree[$j];
		$j++;
	}
}
$initialPopulation[] = $constantThree;

/*choromose four*/
foreach($variantThree as $variantThrees){
	if(in_array($variantThrees, $constantFour)){
		$constantFour[] = 0;
	}else{
		$constantFour[] = $variantThrees;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantFour)){
		
	}else{
		$toChangeFour[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantFour[$i] == 0){
		$constantFour[$i] = $toChangeFour[$j];
		$j++;
	}
}
$initialPopulation[] = $constantFour;

/*five and six*/

for($i = 0; $i<7 ; $i++){
	$constantFive[] = $updatedPopulation[4][$i];
	$constantSix[] = $updatedPopulation[5][$i];
}

for($i = 7; $i<14 ; $i++){
	$variantFive[] = $updatedPopulation[4][$i];
	$variantSix[] = $updatedPopulation[5][$i];
}
/*choromosome five*/
foreach($variantSix as $variantSixs){
	if(in_array($variantSixs, $constantFive)){
		$constantFive[] = 0;
	}else{
		$constantFive[] = $variantSixs;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantFive)){
		
	}else{
		$toChangeFive[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantFive[$i] == 0){
		$constantFive[$i] = $toChangeFive[$j];
		$j++;
	}
}
$initialPopulation[] = $constantFive;

/*choromose six*/
foreach($variantFive as $variantFives){
	if(in_array($variantFives, $constantSix)){
		$constantSix[] = 0;
	}else{
		$constantSix[] = $variantFives;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantSix)){
		
	}else{
		$toChangeSix[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantSix[$i] == 0){
		$constantSix[$i] = $toChangeSix[$j];
		$j++;
	}
}
$initialPopulation[] = $constantSix;

/*seven and eight*/

for($i = 0; $i<7 ; $i++){
	$constantSeven[] = $updatedPopulation[6][$i];
	$constantEight[] = $updatedPopulation[7][$i];
}

for($i = 7; $i<14 ; $i++){
	$variantSeven[] = $updatedPopulation[6][$i];
	$variantEight[] = $updatedPopulation[7][$i];
}
/*choromosome seven*/
foreach($variantEight as $variantEights){
	if(in_array($variantEights, $constantSeven)){
		$constantSeven[] = 0;
	}else{
		$constantSeven[] = $variantEights;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantSeven)){
		
	}else{
		$toChangeSeven[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantSeven[$i] == 0){
		$constantSeven[$i] = $toChangeSeven[$j];
		$j++;
	}
}
$initialPopulation[] = $constantSeven;

/*choromose eight*/
foreach($variantSeven as $variantSevens){
	if(in_array($variantSevens, $constantEight)){
		$constantEight[] = 0;
	}else{
		$constantEight[] = $variantSevens;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantEight)){
		
	}else{
		$toChangeEight[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantEight[$i] == 0){
		$constantEight[$i] = $toChangeEight[$j];
		$j++;
	}
}
$initialPopulation[] = $constantEight;

/*nine and ten*/

for($i = 0; $i<7 ; $i++){
	$constantNine[] = $updatedPopulation[8][$i];
	$constantTen[] = $updatedPopulation[9][$i];
}

for($i = 7; $i<14 ; $i++){
	$variantNine[] = $updatedPopulation[8][$i];
	$variantTen[] = $updatedPopulation[9][$i];
}
/*choromosome nine*/
foreach($variantTen as $variantTens){
	if(in_array($variantTens, $constantNine)){
		$constantNine[] = 0;
	}else{
		$constantNine[] = $variantTens;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantNine)){
		
	}else{
		$toChangeNine[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantNine[$i] == 0){
		$constantNine[$i] = $toChangeNine[$j];
		$j++;
	}
}
$initialPopulation[] = $constantNine;

/*choromose ten*/
foreach($variantNine as $variantNines){
	if(in_array($variantNines, $constantTen)){
		$constantTen[] = 0;
	}else{
		$constantTen[] = $variantNines;
	}
}

for($i = 0; $i<14 ; $i++){
	if(in_array($i, $constantTen)){
		
	}else{
		$toChangeTen[] = $i;
	}
}

$j = 0;
for($i = 0; $i<14 ; $i++){
	if($constantTen[$i] == 0){
		$constantTen[$i] = $toChangeTen[$j];
		$j++;
	}
}
$initialPopulation[] = $constantTen;


}

echo '<h1>Final Result:</h1>';
for($i = 0; $i<14 ; $i++){
echo $finalPopulation[$i] . '->';
}
echo 'Distance:';
echo $finalDistance;

?>