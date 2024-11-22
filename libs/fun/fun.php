<?php

/*
 * fillter
 */
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
 * check email
 */
function checkEmail($email){
    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        return 0;
    }

}

/*
 * validate username
 */
function validUsername($uname){
    $uname_arr = str_split($uname);
    if (count($uname_arr) <= 32){
        return 1;
    } else {
        return 0;
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
 * important PV
 */
function isPV($pt){
    return validatePV($pt);
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
 * check url
 */
function checkUrl($url){
    if (filter_var($url, FILTER_VALIDATE_URL)) {
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
 * match sined up country code
 */
function matchSinedUpCountryCode($register_country_code){
    $site_info_row = $GLOBALS['site_info_row'];
    if ($site_info_row['country_code_check_action']){
        $country_code = getClientCountryCode();
        if ($register_country_code == $country_code){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 1;
    } 
}

/*
 * match login country code
 */
function matchLoginCountryCode($login_country_code){
    if ($site_info_row['country_code_check_action']){
        $site_info_row = $GLOBALS['site_info_row'];
        $country_code = getClientCountryCode();
        if ($login_country_code == $country_code){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 1;
    }
}

/*
 * is logged
 */
function isLogged(){
    if (isset($_SESSION['uname'])){
        return 1;
    } else {
        return 0;
    }
}

/*
 * get day affer period
 */
function getBeforeDay($days){
    $format = 'Y-m-d';
    $end = date_create(date($format));
    $start = date_add($end,date_interval_create_from_date_string(-$days."days"));
    $start = date_format($start, $format);
    return $start;
}

/*
 * get last days
 */
function getLastDays($days){
    $format = 'Y-m-d';
    $end = date_create(date($format));
    $start = date_add($end,date_interval_create_from_date_string(-$days."days"));
    $start = date_format($start, $format);
    $end = date($format);
    $array = array(); 
    $interval = new DateInterval('P1D'); 
    $realEnd = new DateTime($end); 
    $realEnd->add($interval); 
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
    foreach($period as $date) {                  
        $array[] = $date->format($format);  
    } 
    return $array;
}

/*
 * show page
 */
function showPage($slug){
    if (isset($slug)){
        if (isPV($slug)){
            return "plugins/$slug/$slug.php";
        }
    }
}

/*
 * offerwall IP whitelisting
 */
function checkOfferwallWhitelisting($allowed_ips_arr){
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $IP = $_SERVER['HTTP_X_FORWARDED_FOR']; 
    }else { 
        $IP = $_SERVER['REMOTE_ADDR'];
    }

    if(in_array($IP, $allowed_ips_arr)) {
        return 1;
    } else {
        return 0;
    }
}

/*
 * user info
 */
function requireSiteInfoFun(){
    return __DIR__.'/fun/site_info/site_info.php';
}

/*
 * db
 */
function requireDBFun(){
    return __DIR__.'/fun/db/db.php';    
}

/*
 * pager
 */
function requirePager(){
    return 'libs/pager/pager.php';    
}

/*
 * user info
 */
function requireUserInfo(){
    return __DIR__.'/fun/user/user_info.php';
}

/*
 * account
 */
function requireAccountFun(){
    return __DIR__.'/fun/account/account.php';
}

/*
 * user rating
 */
function requireUserRatingFun(){
    return __DIR__.'/fun/user/rating.php';
}

/*
 * ref 
 */
function requireRefFun(){
    return __DIR__.'/fun/ref/ref.php';
}

/*
 * update site info
 */
function requireUpdateSiteInfo(){
    return __DIR__.'/fun/site_info/site_info.php';
}

/*
 * user bal
 */
function requireUserBal(){
    return __DIR__.'/fun/user/user_bal.php';
}

/*
 * page fun
 */
function requirePageFun(){
    return __DIR__.'/fun/page/page.php';
}

/*
 * statistics
 */
function requireStatistics(){
    return __DIR__.'/fun/statistics/statistics.php';
}

/*
 * surf
 */
function requireSurfFun(){
    return __DIR__.'/fun/surf/surf.php';
}

/*
 * shortlinks
 */
function requireShortlinksFun(){
    return __DIR__.'/fun/shortlinks/shortlinks.php';
}

/*
 * offerwall
 */
function requireOfferwallFun(){
    return __DIR__.'/fun/offerwall/offerwall.php';
}

/*
 * api
 */
function requireApiFun(){
    return __DIR__.'/fun/api.php';
}

/*
 * withdraw
 */
function requireWithdrawFun(){
    return __DIR__.'/fun/withdraw/withdraw.php';
}

/*
 * deposit
 */
function requireDepositFun(){
    return __DIR__.'/fun/deposit/deposit.php';
}

/*
 * statistics
 */
function requireStatisticsFun(){
    return __DIR__.'/fun/statistics/statistics.php';
}

/*
 * campaign
 */
function requireCampaign(){
    return __DIR__.'/fun/campaign/campaign.php';
}

/*
 * head  code
 */
function requireHeadCode(){
    return 'libs/code/head_code.php';
}

/*
 * top  code
 */
function requireTopCode(){
    return 'libs/code/top_code.php';
}

/*
 * bottom  code
 */
function requireBottomCode(){
    return 'libs/code/bottom_code.php';
}

/*
 * left  code
 */
function requireLeftCode(){
    return 'libs/code/left_code.php';
}

/*
 * footer  code
 */
function requireFooterCode(){
    return 'libs/code/footer_code.php';
}

/*
 * right  code
 */
function requireRightCode(){
    return 'libs/code/right_code.php';
}

/*
 * faucet top code
 */
function requireFaucetTopCode(){
    return 'libs/code/faucet_top_code.php';
}

/*
 * faucet code
 */
function requireFaucetCode(){
    return 'libs/code/faucet_code.php';
}

/*
 * faucet bottom code
 */
function requireFaucetBottomCode(){
    return 'libs/code/faucet_bottom_code.php';
}

/*
 * 
 */
function getPage($page){
    $page_limit = $GLOBALS['site_info_row']['page_limit'];
    if ($page_limit>0){
        if (empty($page)) {
            return 0;
        } elseif ($page == $page_limit) {
            return 0;
        } else {
            return $page * $page_limit - $page_limit;
        }

    } else {
        return 0;
    }
}