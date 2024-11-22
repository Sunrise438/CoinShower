<?php

//goggle re capcha
$sql = "SELECT * FROM captcha WHERE type = 'recap'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$grecap_site_key = $row['site_key'];
$grecap_secret_key = $row['secret_key'];
$grecap_action = $row['status'];

require 'recap_data.php';