<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['menu_order'])){
        $menu_oder = $_POST['menu_order'];
        changeMenuOrder($menu_oder);
        header('location:menu');
    }  
    
    if(isset($_POST['action']) && isset($_POST['status'])){
        $action = test_input($_POST['action']);
        $status = test_input($_POST['status']);
        changeMenuStatus($action, $status);
        header('location:menu');
    } 
    
    if(isset($_POST['new']) && isset($_POST['slug']) && isset($_POST['name']) && isset($_POST['type'])){
        if ($_POST['new']){
            $slug = test_input($_POST['slug']);
            $name = test_input($_POST['name']);
            $type = test_input($_POST['type']);
            addNewMenuItem($slug, $name, $type, 1);
        }
        header('location:menu');
    } 
    
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['q']) && isset($_GET['token'])){
            if ($_GET['q'] == 'delete'){
                $id = test_input($_GET['token']);
                deleteMenuItem($id);
            }
            header('location:menu');
        } 
}