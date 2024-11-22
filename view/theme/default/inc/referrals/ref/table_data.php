<?php

/*
 * page limit
 */
$page_limit = $site_info_row['page_limit'];
if(isset($_GET['page'])){
    $page = test_input($_GET['page']);
} else {
    $page = 0;
}

require 'select.php';
require 'tb.php';

/*
 * pages
 */
if (isset($result['rows'])){
    pager($result['rows'], 'referrals', $page, $parameter);
}
