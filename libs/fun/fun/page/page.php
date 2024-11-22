<?php

/*
 * validate
 */
function validatePV($name){
    $post = [
        'type' => 'p',
        'p' => $name,
        'p_key' => readPLfile($name),
        'url'   => get_url_hostname($GLOBALS['site_info_row']['site_url'])
    ];
    $ch = curl_init(getScriptInfo()['url'].'/'.getScriptInfo()['slug'].'/install-postback.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response);
    if ($data->activation){
            return 3;
        }
    if ($data->status==200 && $data->message=='OK' && $data->plugin==$name && $data->activation==0){
        return 1;
    } else {
        return 0;
    }
}

/*
 * read 
 */
function readPLfile($name){
    $file = "plugins/$name/.ak.txt";
    if (is_file($file)){
        $myfile = fopen($file, "r");
        if (filesize($file) > 0){
            $txt = fread($myfile,filesize($file));
        }else{
            $txt = '';
        }
        
        fclose($myfile);
        return $txt;
    } else {
        return '';
    }
}