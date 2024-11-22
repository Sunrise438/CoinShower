<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['pagelimit'])){
        $pagelimit = test_input($_POST['pagelimit']);
        updateSiteInfo('page_limit', $pagelimit);
        header('location:settings');
    }  
}