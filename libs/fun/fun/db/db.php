<?php

/*
 * select table all
 */
function selectTable($table, $col, $page = 0, $where = NULL, $order=NULL){
    $page = getPage($page);

    $rsql = "SELECT COUNT(id) FROM $table $where";
    $rresult = $GLOBALS['conn']->query($rsql);
    $rrow = $rresult->fetch_assoc();
    $rows = $rrow['COUNT(id)'];
    $page_limit = $GLOBALS['site_info_row']['page_limit'];
    $sql = "SELECT $col FROM $table $where $order LIMIT $page,$page_limit";
    $result = $GLOBALS['conn']->query($sql);
    $row_arr = array();
    $i = 0;
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $row_arr[$i] = $row;
            $i++;
        }
        return array('rows' => $rows, 'result' => $row_arr);
    } else {
        return 0;
    }
}