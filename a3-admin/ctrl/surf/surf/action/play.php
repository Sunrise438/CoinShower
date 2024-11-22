<?php

//pause surf
if (isset($surf_info)){
    surfPlayPause($surf_id, 1);
}

if (isset($_GET['redt'])){
    $redt = '?t='.$_GET['redt'];
} else {
    $redt = '';
}


header('location:surf'.$redt);