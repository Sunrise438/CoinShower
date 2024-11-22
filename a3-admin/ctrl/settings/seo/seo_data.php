<?php
    
    function editSEO($description, $keywords){
        $sql = "UPDATE site_info SET description = '$description', keywords = '$keywords' WHERE id = 1";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['seosettings'])){
        $description = test_input($_POST['description']);
        $key = test_input($_POST['key']);
        
        editSEO($description, $key);
        header("location:seo");

    }
}