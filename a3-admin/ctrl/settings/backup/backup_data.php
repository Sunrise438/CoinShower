<?php

session_start();

if (empty($_SESSION['aemail'])){
    die();
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require '../../../config/config.php';
    
    if (isset($_POST['fdbup'])){
        if ($_POST['fdbup'] == 'dbup'){
            //Getting Database Table Names
            $tables = array();
            $sql = "SHOW TABLES";
            $all_content = mysqli_query($conn, $sql);

            while ($data_res = mysqli_fetch_row($all_content)) {
                $tables[] = $data_res[0];
            }

            //Create SQL Script for Table Data/Structure
            $mysql_backup_scripts = "";
            foreach ($tables as $table) {

                $sql_QQ = "SHOW CREATE TABLE $table";
                $all_content = mysqli_query($conn, $sql_QQ);
                $data_res = mysqli_fetch_row($all_content);

                $mysql_backup_scripts .= "\n\n" . $data_res[1] . ";\n\n";


                $sql_QQ = "SELECT * FROM $table";
                $all_content = mysqli_query($conn, $sql_QQ);

                $totalCounter = mysqli_num_fields($all_content);

                for ($i = 0; $i < $totalCounter; $i ++) {
                    while ($data_res = mysqli_fetch_row($all_content)) {
                        $mysql_backup_scripts .= "INSERT INTO $table VALUES(";
                        for ($j = 0; $j < $totalCounter; $j ++) {
                            $data_res[$j] = $data_res[$j];

                            if (isset($data_res[$j])) {
                                $mysql_backup_scripts .= '"' . $data_res[$j] . '"';
                            } else {
                                $mysql_backup_scripts .= '""';
                            }
                            if ($j < ($totalCounter - 1)) {
                                $mysql_backup_scripts .= ',';
                            }
                        }
                        $mysql_backup_scripts .= ");\n";
                    }
                }

                $mysql_backup_scripts .= "\n"; 
            }

            //Save and Download Database Backup File
            if(!empty($mysql_backup_scripts)){
                $final_result_orignal_recovery_file = '../../../backup_db/'.$dbname . '_' . date("Ymd_his") . '.sql';
                $fileHandler = fopen($final_result_orignal_recovery_file, 'w+');
                $number_of_lines = fwrite($fileHandler, $mysql_backup_scripts);
                fclose($fileHandler); 

                if (isset($_POST['d'])){
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename=' . basename($final_result_orignal_recovery_file));
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($final_result_orignal_recovery_file));
                    ob_clean();
                    flush();
                    readfile($final_result_orignal_recovery_file);
                    exec('rm ' . $final_result_orignal_recovery_file);
                }

                

            }
        }
    }
        
}