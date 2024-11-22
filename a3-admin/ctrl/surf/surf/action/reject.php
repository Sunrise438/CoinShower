<?php

//pause surf
if (isset($surf_info)){
    surfStatus($surf_id, 3);
}

if (isset($_GET['redt'])){
    $redt = '?t='.$_GET['redt'];
} else {
    $redt = '';
}


header('location:surf'.$redt);

