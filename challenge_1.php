<?php
$student = true ;
$bill_tea = 10.00 ;
$order = 6 ;
$cost_student = $bill_tea - ($bill_tea * 0.2);

if ($student == true and $order > 5) {
  $bill_tea = $cost_student;
  $bill_tea = ($bill_tea * $order) - $order ;
  echo "you have a discount of 20% as a student and -1 dh per a tea if u have more than 5 the price is " , $bill_tea , " MAD" ;
  
} 
elseif 
($student == true) {
  $bill_tea = $cost_student * $order;
 echo "you have a discount of 20% as a student the price is " , $bill_tea , " MAD" ;}
 
elseif 
($order > 5) {
 $bill_tea = ($bill_tea * $order) - $order ;
  echo " the price is " , $bill_tea , " MAD" ;
}
else {
 $bill_tea = $bill_tea * $order ;
 echo " the price is " , $bill_tea , " MAD" ;
 }
?>