<?php
/**
 * @function    importDatabaseTables
 * @author      Tutorialswebsite
 * @link        http://www.tutorialswebsite.com
 * @usage       Import database tables from a SQL file
 */

$dbHost     = $this->isevername;
$dbUname = $this->idbuser;
$dbPass = $this->idbpass;
$dbName     = $this->idbname;
$filePath   = 'db/a3script.sql';

if(file_exists($filePath)){
    if(importDatabaseTables($dbHost, $dbUname, $dbPass, $dbName, $filePath) == 1){
        $ok = 1;
    } else {
        $ok = 0;
    }
} else {
    $ok = 0;
}

function importDatabaseTables($dbHost, $dbUname, $dbPass, $dbName, $filePath){
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUname, $dbPass, $dbName); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error importing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    
    return !empty($error)?$error:true;
}

