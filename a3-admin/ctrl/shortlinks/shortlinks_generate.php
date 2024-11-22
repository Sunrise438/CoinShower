

<?php

class GenLink{
    private $gen;
    
    function setGen($ranlink, $conn){
        $this->gen = $ranlink;
        
        if(isset($this->gen)){
            
            //check if exist or not
            $sql = "SELECT id FROM shortlinks WHERE link = '$this->gen'";
            $result = $conn->query($sql);
            
                if ($result->num_rows < 1){
                    //update database
                    $sql = "INSERT INTO shortlinks (link) VALUES ('$this->gen')";
                    if($conn->query($sql) === TRUE){
                    header('location:shortlinks');
                    }
                }
        }
    }
}
//generate new link
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['gen'] == 'genlink'){
        
        //genatare random links
        $n= rand(4, 20);
        
            function getName($n) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';

                for ($i = 0; $i < $n; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $randomString .= $characters[$index];
                }

                return $randomString;
            }

            $ranlink = getName($n);
        
        //call to class
        $sg = new GenLink();
        $sg->setGen($ranlink, $conn);
        
    }
}