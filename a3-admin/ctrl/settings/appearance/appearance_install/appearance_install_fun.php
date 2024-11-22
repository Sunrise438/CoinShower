<?php
/*
 * download theme
 */
function downloadCurlThemes($file, $file_dir){
    if (is_file('extra/appearance_install/'.$file)){
        return 0;
    } else {
        $url = "http://localhost/script/anglesub/themes-ins/".$file_dir.$file;
        $ch = curl_init(); 
    
        $fh = fopen($file, "w");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FILE, $fh);
        curl_exec($ch);
        curl_close($ch);
        return 1;
    }
}