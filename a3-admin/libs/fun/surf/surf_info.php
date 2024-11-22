<?php

//surf info
//don't edit
function surfInfoById($surf_id){
    $sql = "SELECT * FROM surf WHERE  id = '$surf_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}
