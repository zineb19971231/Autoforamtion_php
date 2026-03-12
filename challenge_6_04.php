<?php 


function MultiplyNumbers($a,$b){
    if (is_int($a) && is_int($b)){
       $resultat = $a * $b;
       echo " Le résultat  est : " . $resultat;
    }
    else { echo "error : invalid input ";}

}

MultiplyNumbers(8,"a") ."<br>";
MultiplyNumbers(8,5);


    // echo "error : invalid input";
 



























?>