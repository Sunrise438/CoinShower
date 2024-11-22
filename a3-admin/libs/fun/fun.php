<?php
require __DIR__.'/country_code.php';

 function test_input($data){
     $data = $GLOBALS['conn']->real_escape_string($data);
     $data = trim($data);
     $data = strip_tags($data);
     $data = stripcslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 }
 
 /*
 * human readable format
 */
function hrfFormat($hrf){
    if ($hrf < 1000){
        return $hrf;
        
    }elseif ($hrf > 1000000000) {
        return number_format(($hrf/1000000000),2).'B';
        
    }elseif ($hrf > 1000000) {
        return number_format(($hrf/1000000),2).'M';
        
    }elseif ($hrf >= 1000 && $hrf <1000000) {
        return number_format(($hrf/1000),2).'K';
    }
}

/*
 * validate email
 */
function isEmail($email){
    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 1;
    } else {
        return 0;
    }
}

/*
 * create hashed password
 */
 function passHash($pass){
    $options = [
            'cost' => 12,
    ];

    return password_hash($pass, PASSWORD_BCRYPT, $options);

 }
 
 /*
  * validate password
  * character length
  * character symbols
  * numbers
  */
 function validatePassword($password){
    $word_arr = str_split($password, 1);
    if (count($word_arr) >= 8){
        return 1;
    } else {
        return 0; 
    }
 }
 
 /*
 * select login token
 */
function selectLoginToken($email){
    $login_ip = getClientIp();
    $country_code = getClientCountryCode();
    $sql = "SELECT admin_email, login_token FROM admin_users "
            . "WHERE admin_email = '$email' AND login_ip = '$login_ip' AND login_country = '$country_code' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}
 
 /*
  * validate login
  */
 function validateLogin(){
     if (isset($_SESSION['aemail']) && isset($_SESSION['admin_login_token'])){
         $email = test_input($_SESSION['aemail']);
         $lt = selectLoginToken($email);
         if ($lt != 0){
             if ($lt['login_token'] == $_SESSION['admin_login_token']){
                 return 1;
             } else {
                 return 0;
             }
         } else {
             return 0;
         }
     } else {
         return 0;
     }
 }

 /*
 * client ip
 */
function getClientIp(){
    //whether ip is from the share internet  
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //whether ip is from the proxy 
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        //whether ip is from the remote address  
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

/*
 * detect whether ip is from the proxy 
 */

function isClientIpProxy(){
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //whether ip is from the proxy 
        return 1;
    } else {
        return 0;
    }
}

/*
 * get client country code
 */
function getClientCountryCode(){
    if (isset($_SERVER['HTTP_CF_IPCOUNTRY'])) {
        //whether ip is from the proxy 
        return $_SERVER['HTTP_CF_IPCOUNTRY'];
    } else {
        return '';
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

//check url
function checkUrl($url){
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return 1;
    } else {
        return 0;
    }
}

//check image url
function checkImage($img){
    if (@getimagesize($img)) {
        return 1;
    } else {
        return 0;
    }
}

//remove whitespace
function removeWhitespace($whitespace){
    $whitespace = str_replace(' ','',$whitespace); 
    return $whitespace;
}

//check between 0 - 10
function checkScore($score){
    if($score>=0 && $score<=10){
        return 1;
    } else {
        return 0;
    }
}

//file size convert 
function filesize_formatted($file)
{
    $bytes = filesize($file);

    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        return $bytes . ' bytes';
    } elseif ($bytes == 1) {
        return '1 byte';
    } else {
        return '0 bytes';
    }
}

/*
 * script 
 * important
 */
function getScriptInfo($token = NULL){
    $info_arr = array(
        'name' => 'a3script',
        'slug' => 'a3script',
        'url' => 'https://a3script.com'
    );
    if ($token != NULL){
        return $info_arr[$token];
    } else {
        return $info_arr;
    }
}

/* 
 * important PV
 */
function isPV($pt){
    return validatePV($pt);
}

/* 
 * important TV
 */
function isTV($pt){
    return validateTV($pt);
}

/*
 * write file
 */
function writeFile($file, $txt, $new = 0){
    if (isset($file)){
        $myfile = fopen($file, "w");
        if (fwrite($myfile, $txt) != FALSE){
            fclose($myfile);
            return 1;
        } else {
            fclose($myfile);
            return 0;
        }
    } else {
        if ($new){
            $myfile = fopen($file, "w");
            if (fwrite($myfile, $txt) != FALSE){
                fclose($myfile);
                return 1;
            } else {
                fclose($myfile);
                return 0;
            }
        } else {
            return 0;
        }
    }      
}

function deleteDirectory($dirPath) {
   if (is_dir($dirPath)) {
      $files = scandir($dirPath);
      foreach ($files as $file) {
         if ($file !== '.' && $file !== '..') {
            $filePath = $dirPath . '/' . $file;
            if (is_dir($filePath)) {
               deleteDirectory($filePath);
            } else {
               unlink($filePath);
            }
         }
      }
      rmdir($dirPath);
   }
}

function updateSiteInfo($column, $value){
    $sql = "UPDATE site_info SET $column = '$value' WHERE id = 1 ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
}

/*
 * detect proxy ip
 */
function detectProxyIp(){
    $poxy_header = 'HTTP_X_FORWARDED_FOR';
    if (array_key_exists($poxy_header, $_SERVER)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * get proxy ip
 */
function getProxyIp(){
    $poxy_header = 'HTTP_X_FORWARDED_FOR';
    if (array_key_exists($poxy_header, $_SERVER)){
        $visitors_poxy_ip = trim(end(explode(',',$_SERVER[$poxy_header], $string)));
        if (filter_var($visitors_poxy_ip, FILTER_VALIDATE_IP)){
            return $visitors_poxy_ip;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

/*
 * unzip zip file
 */
function unzip($zip_file, $destination_path){
    $zip = new ZipArchive; 
    if ($zip->open($zip_file) === TRUE) { 
        $zip->extractTo($destination_path); 
        $zip->close(); 
        return 1;
    } else { 
        return 0;
    }
}

/*
 * PHPMailer
 */
function requirePHPMailer(){
    return '../libs/vendor/PHPMailer/mail.php';
}

/*
 * site info fun
 */
function requireSiteInfoFun(){
    return __DIR__.'/site_info/site_info.php';
}

/*
 * login fun
 */
function requireLoginFun(){
    return __DIR__.'/user/login.php';
}

/*
 * payments
 */
function requirepaymentsFun(){
    return __DIR__.'/payments/payments.php';
}

/*
 * statistics fun
 */
function requireStatistics(){
    return __DIR__.'/statistics/statistics.php';
}

/*
 * user info
 */
function requireUserInfo(){
    return __DIR__.'/user/user_info.php';
}

/*
 * faucet fun
 */
function requireEmailFun(){
    return __DIR__.'/email/email.php';
}

/*
 * faucet fun
 */
function requireFaucetFun(){
    return __DIR__.'/faucet/faucet.php';
}

/*
 * faucet fun
 */
function requireShortlinksFun(){
    return __DIR__.'/shortlinks/shortlinks.php';
}

/*
 * country code
 */
function requireCountryCode(){
    return __DIR__.'/country_code.php';
}
