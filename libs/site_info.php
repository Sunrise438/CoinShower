<?php

/*
 * site info
 */
function siteInfo(){
    $sql = "SELECT * FROM site_info WHERE id='1'";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

$site_info_row = siteInfo();


/*
 * coin type
 */
$sql = "SELECT coin, value FROM coin_type WHERE status='1'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $selectedCoin = $row['coin'];
    $selectedCoin_value = $row['value'];
} else {
    $selectedCoin = 'btc';
}

/*
 * PHPMailer
 */
function requirePHPMailer(){
    return __DIR__.'/vendor/PHPMailer/mail.php';
}

/*
 * total users
 */
function totalUserByLastId(){
    $sql = "SELECT id FROM users ORDER BY id DESC LIMIT 1 ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row['id'];
    } else {
        return 0;
    }
}