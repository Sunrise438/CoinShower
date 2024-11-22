<?php
$page_limit = $site_info_row['page_limit'];
if ($page_limit>0){
    if (empty($_GET['page'])) {
        $page = 0;
    } elseif ($_GET['page'] == $page_limit) {
        $page = 0;
    } else {
        $page = $_GET['page'] * $page_limit - $page_limit;
    }
    
} else {
    $page_limit = 0;
    if (empty($_GET['page'])){
    $page = 0;
    
    }elseif ($_GET['page'] == 20) {
        $page = 0;

    } else {
        $page = $_GET['page']*20-20;

    }
}


