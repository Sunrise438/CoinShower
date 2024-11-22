<?php

/*
 * select menu item
 */
function selectMenuItem($id){
    $sql = "SELECT * FROM taxonomy WHERE id = '$id'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

/*
 * get menu item
 */
function getMenuItems($type = NULL){
    if ($type != NULL){
        $where = "WHERE type = '$type' ";
    } else {
        $where = "";
    }
    $sql = "SELECT * FROM taxonomy $where ORDER BY queue_order ASC";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $menu_arr = array();
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $menu_arr[$i] = $row;
            $i++;
        }
        return $menu_arr;
    } else {
        return 0;
    }
}

/*
 * change menu order
 */
function changeMenuOrder($order_arr){
    $sql = "UPDATE taxonomy SET queue_order = '0' ";
    if ($GLOBALS['conn']->query($sql)){
        $x = 1;
        foreach ($order_arr as $value) {
            $value = test_input($value);
            echo $x;
        $sql = "UPDATE taxonomy SET queue_order = '$x' WHERE id = '$value' ";
            $GLOBALS['conn']->query($sql);
            $x++;
        }
        return 1;
    } else {
        return 0;
    }
}

/*
 * change status
 */
function changeMenuStatus($id, $status){
    if ($status || !$status){
        
    } else {
        return 0;
    }
    $sql = "UPDATE taxonomy SET status = '$status' WHERE id = '$id' ";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    }else {
        return 0;
    }
}

/*
 * add new menu item
 */
function addNewMenuItem($slug, $name, $type = NULL, $removable = 0){
    $sql = "INSERT INTO taxonomy (slug, name, type, removable ) VALUES('$slug', '$name', '$type', '$removable') ";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    }else {
        return 0;
    }
}

/*
 * delete menu item
 */
function deleteMenuItem($id){
    $item = selectMenuItem($id);
    if ($item != 0){
        $id = $item['id'];
        $sql = "DELETE FROM taxonomy WHERE id='$id'";
        if ($GLOBALS['conn']->query($sql)){
            return 1;
        }else {
            return 0;
        }
    } else {
        return 0;
    }
}







/*
 * list menu chlid
 */
function listMenuChild($parent, $type){
    $sql = "SELECT * FROM taxonomy "
            . "WHERE type = '$type' AND sub_id = '$parent' AND relation = 'c'   AND status = 1";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $menu_arr = array();
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $menu_arr[$i] = $row;
            $i++;
        }
        return $menu_arr;
    } else {
        return 0;
    }
}

/*
 * list menu
 */
function listMenu($type){
    $sql = "SELECT * FROM taxonomy WHERE type = '$type' AND (relation = 'p' OR relation = 'd') AND status = 1";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $menu_arr = array();
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $menu_arr[$i] = $row;
            $i++;
        }
        return $menu_arr;
    } else {
        return 0;
    }
}