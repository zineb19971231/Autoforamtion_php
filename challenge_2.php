<?php

$age = 1 ;
switch ($age){
    case $age < 12 :
        echo "the price is 20 MAD , BONUS Special: Children's Menu included!";
        break;
    case $age >= 12 && $age < 18 :
        echo "the price is 40 MAD ";
        break ;
        case $age >= 60 :
            echo "the price is 30 MAD ";
            break;
    default:
        echo 'the price is 60 MAD';
}
















?>