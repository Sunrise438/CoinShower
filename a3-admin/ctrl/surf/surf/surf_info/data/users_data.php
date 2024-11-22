<?php
//count total user
$sql = "SELECT id FROM users ORDER BY id DESC LIMIT 1 ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$total_users = $row['id'];


//count today total user
$sql = "SELECT COUNT(id) FROM users  WHERE date > CURDATE() ORDER BY id DESC LIMIT 1 ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$total_users_today = $row['COUNT(id)'];

//count today paid user
$sql = "SELECT SUM(amount) FROM earn_history  WHERE date > CURDATE() AND status = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($result->num_rows>0){
    $total_paid_today = $row['SUM(amount)'];
} else {
    $total_paid_today = 0;
}
