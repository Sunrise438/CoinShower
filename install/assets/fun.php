<?php

function text_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function passHash($pass){
    $options = [
            'cost' => 12,
    ];
    return password_hash($pass, PASSWORD_BCRYPT, $options);
}

function addAdmin($email, $pass){
    $pass_hash = passHash($pass);
    $sql = "INSERT INTO admin_users (admin_email, admin_pass) "
            . "VALUES('$email', '$pass_hash' )";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

/*
 * get url host name
 */
function get_url_hostname($url) {
    if (isset($url)){
        $parseUrl = parse_url(trim($url)); 
        if(isset($parseUrl['host'])){
            $host = $parseUrl['host'];
        }else{
            $path = explode('/', $parseUrl['path']);
            $host = $path[0];
        }
        return trim($host);  
    } else {
        return '';
    }
}

/*
 * add install a3script
 */
function addInstallA3script(){
    $post = [
        'version' => 1.00,
        'ins_key' => 1,
        'url'   => get_url_hostname($_SERVER['SERVER_NAME'])
    ];
    $ch = curl_init('https://a3script.com/a3script/install-postback.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    curl_close($ch);
}