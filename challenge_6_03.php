<?php 

 function IsAdult( $Age){
    if ($Age >= 18)
        {return true ;}
    else {return false ;}
 }

 if (IsAdult(18)) 
{ echo "Access Granted";}
 else { echo "Access Denied";}





























?>