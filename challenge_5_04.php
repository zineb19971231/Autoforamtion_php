<?php 

$counter = 1;
$totale_even = 0;
while ($counter <= 50){
    if ($counter % 2 == 0){
        $totale_even += 1 ;
    }
    $counter++;
}

echo "Total numbers even is : $totale_even";
