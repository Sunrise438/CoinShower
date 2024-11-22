<?php
/*
 * ads info
 */
function adsInfo($ads_id){
    $uname = test_input($_SESSION['uname']);
    $sql = "SELECT * FROM surf WHERE uname = '$uname' AND id = '$ads_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
    
}

/*
 * check previous surf ran or not
 */
function checkpreviousSurfViewed(){
    $uname = test_input($_SESSION['uname']);
    $sql = "SELECT COUNT(id) FROM surf WHERE view = 0 AND uname = '$uname' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        if ($row['COUNT(id)'] == 0){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 1;
    }
}

/*
 * create surf campaign
 */
function createCampaignSurf($title, $url, $duration, $description = '', $countryCode = 'ALL', $rmin = 0){
    if (checkpreviousSurfViewed()){
        if ($GLOBALS['user_info']['p_bal'] > $GLOBALS['site_info_row']['surf_min_bal']){
            $uname = test_input($_SESSION['uname']);
            $price = $GLOBALS['site_info_row']['surf_base_price'] + ($GLOBALS['site_info_row']['surf_price_per_second']*($duration - $GLOBALS['site_info_row']['surf_min_duration']));
            $sql = "INSERT INTO surf (uname, url, price, duration, title, description, country_code, r_min) "
                    . "VALUES('$uname', '$url', '$price', '$duration', '$title', '$description', '$countryCode', '$rmin')";
            if ($GLOBALS['conn']->query($sql)){
                return 1;
            } else {
                return0 ;
            }
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

/*
 * edit surf campaign
 */
function editCampaignSurf($surf_id, $title, $url, $duration, $description = '', $countryCode = 'ALL'){
    $uname = test_input($_SESSION['uname']);
    $price = $GLOBALS['site_info_row']['surf_base_price'] + ($GLOBALS['site_info_row']['surf_price_per_second']*($duration - $GLOBALS['site_info_row']['surf_min_duration']));
    $sql = "UPDATE surf SET url = '$url', price = '$price', duration = '$duration', "
            . "title = '$title', description = '$description', country_code = '$countryCode', status = 0 "
            . "WHERE id = '$surf_id' AND uname = '$uname'";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }

}