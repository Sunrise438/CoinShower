<?php

//pause surf
if (isset($_GET['r'])){
    //delete and retun money
    $surf_bal = $surf_info['balance'];
    $uname = $surf_info['uname'];
    if (deleteSurf($surf_id)){
        updateUserBal($uname, 'p_bal', $surf_bal);
    }
    
} else {
    //delete
    if (isset($surf_info)){
    deleteSurf($surf_id);
    
}
}

if (isset($_GET['redt'])){
    $redt = '?t='.$_GET['redt'];
} else {
    $redt = '';
}


header('location:surf'.$redt);