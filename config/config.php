<?php

$servername = 'https://github.com/Sunrise438/bbvjxbjhnbc';
$username = '';
$password = '';
$dbname = '';
$gp = '';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
   die ();
}
