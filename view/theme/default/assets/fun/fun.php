<?php
/*
 * sub nav item
 */
function navitem($parent, $type){
    $sql = "SELECT id, slug, name, type, relation, icon FROM taxonomy "
            . "WHERE type = '$type' AND sub_id = '$parent' AND relation = 'c'   AND status = 1";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
        echo '<li>
            <a class="dropdown-item" href="'.($row['slug']).'"><i class="'. ucfirst($row['icon']).'"></i> <span class="d-none d-sm-inline">'. ucwords($row['name']).'</span></a>
        </li>';
        }
    }
}

/*
 * nav
 */
function nav($type){
    $sql = "SELECT id, slug, name, type, relation, icon, target FROM taxonomy WHERE type = '$type' AND status = 1";
    $result = $GLOBALS['conn']->query($sql);
    echo $GLOBALS['conn']->error;
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            if ($row['relation'] == 'p'){
                echo '<li class="nav-item dropdown navbar-nav">
                        <a class="nav-link dropdown-toggle text-primary" href="#submenu'.$row['id'].'" 
                            href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fs-4 '.($row['icon']).'"></i> <span class="ms-1 d-none d-sm-inline">'. ucfirst($row['name']).'</span></a>
                        <ul class="dropdown-menu" id="submenu'.$row['id'].'" data-bs-parent="#menu">';
                        navitem($row['id'], 'm');
                            
                echo    '</ul>
                    </li>';
                
            }elseif ($row['relation'] == 'd') {
                echo '<li class="nav-item navbar-nav">
                        <a class="nav-link text-dark" href="'.($row['slug']).'" target="'.$row['target'].'">
                            '. ucwords($row['name']).'
                            </a>
                    </li>';
            }
        }
    }
}

/*
 * site menu sub item
 */
function sideMenuSub($parent, $type){
    $sql = "SELECT id, slug, name, type, relation, icon FROM taxonomy "
            . "WHERE type = '$type' AND sub_id = '$parent' AND relation = 'c'   AND status = 1";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            echo '<li>
            <a href="'.($row['slug']).'" class="nav-link text-dark fw-bold px-0"><i class="'. ucfirst($row['icon']).'"></i> <span class="d-none d-sm-inline">'. ucwords($row['name']).'</span></a>
        </li>';
        }
    }
}
/*
 * menu
 */
function Menu($type, $group){
    $sql = "SELECT id, slug, name, type, relation, icon, target FROM taxonomy "
            . "WHERE type = '$type' AND (relation = 'd' OR relation = 'p') AND bunch = '$group'  AND status = 1";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            
            if ($row['relation'] == 'p'){
                echo '<li class="text-dark">
                        <a href="#submenu'.$row['id'].'" data-bs-toggle="collapse" class="nav-link text-dark fw-bold px-0 align-middle ">
                            <i class="fs-4 '.($row['icon']).'"></i> <span class="ms-1 d-none d-sm-inline">'. ucfirst($row['name']).'</span></a>
                        <ul class="collapse list-group nav ex-column ms-1" id="submenu'.$row['id'].'" data-bs-parent="#menu">';
                        sideMenuSub($row['id'], 's');
                            
                echo    '</ul>
                    </li>';
                
            }elseif ($row['relation'] == 'd') {
                echo '<li>
                        <a href="'.($row['slug']).'" class="nav-link text-dark px-0 align-middle" target="'.$row['target'].'">
                            <i class="'.$row['icon'].'"></i> <span class="ms-1 d-none d-sm-inline">'. ucwords($row['name']).'</span>
                            </a>
                    </li>';
            }
        }
    }
}

/*
 * side manu
 */
function sideMenu($type, $group_arr = array()){
    if (count($group_arr) == 0){
        $sql = "SELECT DISTINCT bunch AS g FROM taxonomy WHERE type = '$type' AND status = 1 ";
        $result = $GLOBALS['conn']->query($sql);
        if ($result->num_rows >0){
            while ($row = $result->fetch_assoc()){
                array_push($group_arr, $row['g']);
            }
        }
    }
    foreach ($group_arr AS $group_value){
        echo '<li>
                <span class="text-secondary ms-1 d-none d-sm-inline">'. strtoupper($group_value).'</span>
            </li>';
        Menu($type, $group_value);
    }
    
    
}

function requireSideBar(){
    return 'view/theme/default/side_bar.php';
}