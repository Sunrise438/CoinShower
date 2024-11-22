<?php


$servername = $this->isevername;
$username = $this->idbuser;
$password = $this->idbpass;
$dbname = $this->idbname;


$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    $ok = 0;
    echo '<p class="text-danger">Your entered database details is incorrect</p>';
} else {
    $ok = 1;
}