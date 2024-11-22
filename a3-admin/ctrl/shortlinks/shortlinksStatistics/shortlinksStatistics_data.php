<?php

//today shortlinks views and earned amount
$sql = "SELECT COUNT(id), SUM(amount) FROM shortlinks_history WHERE date > CURDATE()";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$todayShortlinksTodayViewed = $row['COUNT(id)'];
$todayShortlinksTodayEarnedAmount = $row['SUM(amount)'];