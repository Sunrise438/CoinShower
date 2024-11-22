<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['plugins_install']) && isset($_FILES['file'])){
        uploadPlugins($_FILES['file']);
        header('location:plugins');
    }
}