<?php

//select banned user
$nanned_user = bannnedListedInfoById($token);

if (isset($nanned_user)){
    if (banUser($nanned_user) == 1){
        bannnedListedChangeStatus($token, 1);
    }
}

header('location:banned_list');