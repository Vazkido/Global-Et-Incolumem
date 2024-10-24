<?php

$db=mysqli_connect("localhost","root","") or die("Could not connect.");

// Check connection
if(!$db) 
die("no database");
if(!mysqli_select_db($db,"mkcargo1_db")) //database name
die("No database selected.");

?>