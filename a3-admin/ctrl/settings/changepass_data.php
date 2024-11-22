<?php
$adminEmail = $_SESSION['aemail'];

//variable for input value
$cpass = $npass = $ncpass = '';

//variable for eroor input 
$cpassErr = $npassErr =$ncpassErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['cpass'])){
        //if empty current pass input
        $cpassErr = 'Enter current password';
        
    } else {
        //if isset current password
        $cpass = test_input($_POST['cpass']);
        $cpass = md5($cpass);
        if (empty($_POST['npass'])){
            //if empty new password input
            $npassErr = 'Enter new password';
            
        } else {
            //if isset new password input
            $npass = test_input($_POST['npass']);
            $npass = md5($npass);
            if (empty($_POST['ncpass'])){
                //if empty confirm password input
                $ncpassErr = 'Enter new confirm password';
                
            } else {
                $ncpass = test_input($_POST['ncpass']);
                $ncpass = md5($ncpass);
                
                $sql = "SELECT adminPass FROM users WHERE adminEmail = '$adminEmail'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                
                //chect admin cureent password
                if ($cpass == $row['adminPass'] && $npass == $ncpass){
                    //update new password
                    $sql = "UPDATE users SET adminPass = '$npass' WHERE adminEmail = '$adminEmail'";

                    if ($conn->query($sql) === TRUE) {
                        echo "New password updated successfully";
                        header('location:changepass');
                        
                    } else {
                         echo "Error updating record: " . $conn->error;
                         
                    }
                   
                }

                
            }
            
        }
        
    }
    
}