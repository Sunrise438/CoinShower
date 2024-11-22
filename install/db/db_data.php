 <?php
 //class for database info update
 class dbInfo{
     private $isevername;
     private $idbname;
     private $idbuser;
     private $idbpass;
     
     //set server name
     public function setServerName($isevername){
         if (isset($isevername)){
             $this->isevername = $isevername;
         }
     }
     
     //set database name
     public function setDbName($idbname){
         if (isset($idbname)){
             $this->idbname = $idbname;
         }
     }
     
     //set database user name
     public function setDbUser($idbuser){
         if (isset($idbuser)){
             $this->idbuser = $idbuser;
         } else {
             $this->idbuser = '';
         }
     }
     
     //set database password
     public function setDbPass($idbpass){
         if (isset($idbpass)){
             $this->idbpass = $idbpass;
         } else {
             $this->idbpass = '';
         }
     }
     
     //update db info
     public function updateDbInfo(){
         if (isset($this->isevername) && isset($this->idbname) ){
             
             $ok = 0;
             //create db connection
            require 'create_db.php';
            //create config files
            if ($ok == 1){
                require 'db_file_data.php';
                require 'db_table.php';
                
                
                if ($ok == 1){
                    header('location:addadmin');
                }
            }
            
            
         }
     }
 }
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $isevername = text_input($_POST['serverName']);
     $idbname = text_input($_POST['dbName']);
     $idbuser = text_input($_POST['dbUser']);
     $idbpass = text_input($_POST['dbPass']);
     
     $cdb = new dbInfo();
     $cdb->setServerName($isevername);
     $cdb->setDbName($idbname);
     $cdb->setDbUser($idbuser);
     $cdb->setDbPass($idbpass);
     
     $cdb->updateDbInfo();
 }   