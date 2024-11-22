<?php

//google re capcha
$sql = "SELECT * FROM captcha WHERE type='recap'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$grecap_site_key = $row['site_key'];
$grecap_secret_key = $row['secret_key'];
$grecap_action = $row['status'];

//turnstile capcha
$sql = "SELECT * FROM captcha WHERE type='turnstile'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$turnstile_site_key = $row['site_key'];
$turnstile_secret_key = $row['secret_key'];
$turnstile_action = $row['status'];