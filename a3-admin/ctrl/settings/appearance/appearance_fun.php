<?php

/*
 * read 
 */
function readTLfile($name){
    $file = "../view/theme/$name/.ak.txt";
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

/*
 * add activation key
 */
function addThemseActivationKey($theme, $activation_key){
    $file = '../view/theme/'.$theme.'/.ak.txt';
    if (writeFile($file, $activation_key, 1)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * validate themes
 */
function validateTV($name){
    $post = [
        'type' => 't',
        't' => $name,
        't_key' => readTLfile($name),
        'url'   => get_url_hostname($GLOBALS['site_info_row']['site_url'])
    ];
    //$ch = curl_init('http://localhost/script/'.getScriptInfo()['slug'].'/install-postback.php');
    $ch = curl_init(getScriptInfo()['url'].'/'.getScriptInfo()['slug'].'/install-postback.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response);
    if ($data->activation){
            return 3;
        }
    if ($data->status==200 && $data->message=='OK' && $data->theme==$name && $data->activation==0){
        return 1;
    } else {
        return 0;
    }
}

/*
 * activate appearance
 */
function activeAppearance($appearance){
    if ($GLOBALS['themeAction'] != $appearance){
        $isTV = isTV($appearance);
        if ($isTV == 0){
            return 0;
        }
        if ($isTV == 3){
            return 3;
        }
        if ($isTV){
            $sql = "UPDATE theme SET theme = '$appearance' WHERE id = 1 ";
            if ($GLOBALS['conn']->query($sql)){
                return 1;
            } else {
                return 0;
            }
        }else {
            return 0;
        }
    }else {
        return 1;
    }
}

/*
 * upload appearance
 */
function uploadAppearance($file){
    $destination_path = '../view/theme/';
    if (unzip($file['tmp_name'], $destination_path)){
        return 1;
    } else {
        return 0;
    }
}