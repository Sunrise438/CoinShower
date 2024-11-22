<?php
/*
 * get payments method
 */
function getPaymentsMethod($method = NULL){
    if ($method == NULL){
        $where = "";
    } else {
        $where = "WHERE type = '$method'";
    }
    $sql = "SELECT * FROM api_key $where";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        if ($method == NULL){
            $row_arr = array();
            $i = 0;
            while ($row = $result->fetch_assoc()){
                $row_arr[$i] = $row;
                $i++;
            }
            return $row_arr;
        } else {
            $row = $result->fetch_assoc();
            return $row;
        }
        
    } else {
        return 0;
    }
}