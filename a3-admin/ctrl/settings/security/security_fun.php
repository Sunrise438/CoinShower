<?php

function changeCountryCodeCheck($status){
    if (isset($status)){
        if ($status == 1 || $status == 0){
            $sql = "UPDATE site_info SET country_code_check_action = '$status' WHERE id = 1 ";
            if ($GLOBALS['conn']->query($sql) === TRUE){
                return 1;
            } else {
                return 0;
            }
        }else {
            return 0;
        }
    }else {
            return 0;
        }      
}