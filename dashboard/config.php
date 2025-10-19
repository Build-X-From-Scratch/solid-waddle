<?php
  $host="localhost";
  $user="root";
  $password="";
  $database="kec_tinanggea";
  $connect=mysqli_connect($host,$user,$password);
  mysqli_select_db($connect,$database);
  
?>