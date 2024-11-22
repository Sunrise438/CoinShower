<?php
//user total earned
$sql = "SELECT FLid FROM flusers WHERE FLemail='$FLuname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$user_id = $row['FLid'];