<?php

if ($_GET['a'] == 'pause'){
    if (isset($surf_id)){
        activeSurf($surf_id, 0);
    }
}elseif ($_GET['a'] == 'play') {
    if (isset($surf_id)){
        activeSurf($surf_id, 1);
    }
}

header('location:surfads');