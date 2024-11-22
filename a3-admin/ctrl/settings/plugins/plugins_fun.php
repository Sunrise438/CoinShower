<?php
/*
 * get plugins
 */
function getPlugins($name = NULL){
    if ($name != NULL){
        $where = 'WHERE name = "'.$name.'"';
    } else {
        $where = '';
    }
    
    $sql = "SELECT * FROM plugins $where ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        if ($name != NULL){
            $row = $result->fetch_assoc();
            return $row;
        } else {
            $row_arr = array();
            $i = 0;
            while ($row = $result->fetch_assoc()){
                $row_arr[$row['name']] = $row;
                $i++;
            }
            return $row_arr;
        }
        
    } else {
        return 0;
    }
        
}

/*
 * read 
 */
function readPLfile($name){
    $file = "../plugins/$name/.ak.txt";
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
 * validate plugins
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
 * add plugins list
 */
function addPluginsList($name){
    if (isPV($name)){
        $sql = "INSERT INTO plugins (name) VALUES('$name')";
        if ($GLOBALS['conn']->query($sql)){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

/*
 * remove plugins list
 */
function removePluginsList($name){
    $sql = "UPDATE plugins SET action = 0 WHERE name = '$name' ";
        if ($GLOBALS['conn']->query($sql)){
            return 1;
        } else {
            return 0;
        }
}

/*
 * remove plugins
 */
function removePlugins($name){
    $file = "../plugins/$name";
    deleteDirectory($file);
    removePluginsList($name);

}

/*
 * activate plugins
 */
function activatePlugins($name){
    $isPV = isPV($name);
    if ($isPV == 0){
        return 0;
    }
    if ($isPV == 3){
        return 3;
    }
    if (getPlugins($name) == 0 && $isPV){
        if (addPluginsList($name)){
            return 1;
        } else {
            return 0; 
        }
    } else {
        if ($isPV){
            $sql = "UPDATE plugins SET action = 1 WHERE name = '$name' ";
            if ($GLOBALS['conn']->query($sql)){
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
}

/*
 * add activation key
 */
function addPluginsActivationKey($plugins, $activation_key){
    $file = '../plugins/'.$plugins.'/.ak.txt';
    if (writeFile($file, $activation_key, 1)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * 
 */
function deactivatePlugins($name){
    if (!getPlugins($name)){
        return 0;
    } else {
        $sql = "UPDATE plugins SET action = 0 WHERE name = '$name' ";
        if ($GLOBALS['conn']->query($sql)){
            return 1;
        } else {
            return 0;
        }
    }
}

/*
 * is offerwall
 */
function isOfferwall($offerwall){
    $sql = "SELECT id FROM offerwall_action WHERE offerwall_name = '$offerwall'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        return 1;
    } else {
        return 0;
    }
}

/*
 * add offerwall
 */
function addOfferwall($offerwall, $link){
    if (!isOfferwall($offerwall)){
        $sql = "INSERT INTO offerwall_action (offerwall_name, link) VALUES('$offerwall', '$link')";
        if ($GLOBALS['conn']->query($sql)){
            return 1;
        } else {
            return 0;
        }
    }
}

/*
 * remove offerwall
 */
function removeOfferwall($offerwall){
    $sql = "DELETE FROM offerwall_action WHERE offerwall_name = '$offerwall' ";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * is payment method
 */
function isPaymentMethod($payment_method){
    $sql = "SELECT id FROM apikey WHERE type = '$payment_method'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        return 1;
    } else {
        return 0;
    }
}

/*
 * add payment method
 */
function addPaymentMethod($payment_method, $link){
    if (!isPaymentMethod($payment_method)){
        $sql = "INSERT INTO apikey (type, link, api_key, pub_key, pri_key) "
                . "VALUES('$payment_method', '$link', '', '', '')";
        if ($GLOBALS['conn']->query($sql)){
            return 1;
        } else {
            return 0;
        }
    }
}

/*
 * add menu
 */
function addMenu($slug, $name, $group = NULL, $parents = NULL, $type = NULL, $relation = 'd', $icon = NULL){
    $sql = "INSERT INTO taxonomy (slug, name, bunch, sub_id, type, relation, icon) "
            . "VALUES('$slug', '$name', '$group', '$parents', '$type', '$relation', '$icon')";
        if ($GLOBALS['conn']->query($sql)){
            return 1;
        } else {
            return 0;
        }
}

/*
 * add menu
 */
function removeMenu($slug, $type = NULL){
    if ($type != NULL){
        $where = "WHERE slug = '$slug' AND type = '$type'";
    } else {
        $where = "WHERE slug = '$slug'";
    }
    
    $sql = "DELETE FROM taxonomy  $where ";
        if ($GLOBALS['conn']->query($sql)){
            return 1;
        } else {
            return 0;
        }
}

/*
 * upload plugins
 */
function uploadPlugins($file){
    $destination_path = '../plugins/';
    if (unzip($file['tmp_name'], $destination_path)){
        return 1;
    } else {
        return 0;
    }
}