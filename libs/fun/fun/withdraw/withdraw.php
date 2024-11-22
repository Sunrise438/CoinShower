<?php
/*
 * show withdrawal method
 */
function showWithdrawalMethod($method){
    if (is_dir('ctrl/withdraw/withdraw/'.$method)){
        return "ctrl/withdraw/withdraw/$method/withdraw.php";
    } else {
        if (is_dir('plugins/'.$method.'/')){
            if (isPV($method)){
                return "plugins/$method/withdraw.php";
            }
            
        }
    }
}

/*
 * count last withdrawal before withdraw
 */
function countWithdrawalBeforeWithdraw(){
    $before_withdraw_required = $GLOBALS['site_info_row']['withdraw_required_payments'];
    $uname = $_SESSION['uname'];
    $sql = "SELECT COUNT(id) FROM withdraw_history WHERE uname = '$uname' AND status = 1 LIMIT 10";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    if ($row['COUNT(id)'] >= $before_withdraw_required){
        return 1;
    } else {
        return 0;
    }
}

/*
 * check last withdrawal
 */
function checkLastWithdrawal(){
    $uname = test_input($_SESSION['uname']);
    $sql = "SELECT status FROM withdraw_history WHERE uname = '$uname' AND date > CURDATE() "
            . "ORDER BY id DESC";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows < 1){ 
        return 0;
    } else {
        $row = $result->fetch_assoc();
        if ($row['status'] == 0){
            return 1;
        } else {
            return 1;
        }
    }
}

/*
 * create withdrwal history
 */
function createWithdrawalHistory($addres, $amount, $method, $status, $coin = NULL){
    if ($coin == NULL){
        $coin = strtolower($GLOBALS['selectedCoin']);
    }
    $uname = test_input($_SESSION['uname']);
    $sql = "INSERT INTO withdraw_history (uname, address, amount, method, status, coin) "
            . "VALUES('$uname', '$addres', '$amount', '$method', '$status', '$coin')";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        updateUserBal('withdraw', $amount);
        return 1;
    } else {
        return 0;
    }
}

//select withdrwal
function selectCurrentUnpaidWithdrwal($method){
    $uname = test_input($_SESSION['uname']);
     //select currenty withdraw
    $sql = "SELECT * FROM withdraw_history "
            . "WHERE uname = '$uname' AND method = '$method' AND date > CURDATE() AND status = 0 "
            . "ORDER BY date DESC LIMIT 1";
    $result = $GLOBALS['conn']->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

/*
 * change withdrwal history status
 */
function changeCurrentWithdrwalStatus($id, $status){  
    $uname = test_input($_SESSION['uname']);
    $sql = "UPDATE withdraw_history SET status = '$status' WHERE id = '$id' AND uname = '$uname' ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }

}

/*
 * create withdrawal 
 */
function createWithdrawal($amount){
    $uname = test_input($_SESSION['uname']);
    $user_info = userInfoByUsername($uname);
    $amount = abs($amount);
    $amount = number_format($amount,$GLOBALS['site_val_row']['truncate_currency']);

    if ($amount <= $user_info['bal']  && $amount > 0){
        /*
         * create withdawal history
         */
        if (createWithdrawalHistory($uname, $amount, 0)){
            return 1;
        } else {
            return 0;
        }    
    } else {
        return 0;
    }
}