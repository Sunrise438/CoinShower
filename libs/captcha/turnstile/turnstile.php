<?php

//goggle re capcha
$sql = "SELECT * FROM captcha WHERE type = 'turnstile'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$turnstile_site_key = $row['site_key'];
$turnstile_secret_key = $row['secret_key'];
$turnstile_action = $row['status'];

$js_turnstile_site_key= json_encode($turnstile_site_key);
echo "<script type='text/javascript'> var tsitekey = $js_turnstile_site_key ;\n </script>";

require 'turnstile_data.php';