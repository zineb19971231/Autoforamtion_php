<?php


$friends= array("ahmed"=>"10","mohamed"=>"700","sayed"=>"245","eman"=>"70");
echo " the ones who owe more than 100 MAD are : <br>" ;
foreach( $friends as $key => $value){
     array_sum($friends)  ;
     if ($value > 100) {
         echo $key . " : " . $value . "<br>" ;
     }
}
echo  " the total is " , array_sum($friends) , " MAD <br>";
?>