<?php

if (isset($_GET['sq'])){
    require 'fun/shortlinks/shortlinks_info.php';
    require 'shortlinks_fun.php';
    $shortlinks_id = test_input($_GET['sq']);
    $shortlinks_id = (int)$shortlinks_id;
    $shortlinks_info = shortlinksInfoById($shortlinks_id);
    
    $link = $shortlinks_info['link'];
    $today_views = shortlinksTodayViews($link);
    
    
    require 'shortlinks_info.php';
    require 'shortlinks_data.php';
    require 'shortlinks_statistics.php';
        
} else {
    header('location:shortlinks');
}