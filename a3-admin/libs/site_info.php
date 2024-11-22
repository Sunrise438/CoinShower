<?php
//site info
function siteInfo(){
    //site info
    $sql = "SELECT * FROM site_info WHERE id='1'";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

$site_info_row = siteInfo();

//coin type
$sql = "SELECT coin, value FROM coin_type WHERE status='1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($result->num_rows > 0){
    $selectedCoin = $row['coin'];
    $selectedCoin_value = $row['value'];
} else {
    $selectedCoin = 'btc';
}