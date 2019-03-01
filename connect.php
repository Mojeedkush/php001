<?php

$connect = mysqli_connect("localhost","root","","practice");

if($connect){
  echo "I am connected";
} else {
    echo "I am not ready";
}

?>