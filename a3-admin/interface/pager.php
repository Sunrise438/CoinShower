<?php

//create pages
//if page geater tha 1
$nresult = $conn->query($nsql);
$nrow = $nresult->fetch_assoc();
$nrow = $nrow['COUNT(id)'];

$n = $nrow/$page_limit;
$n = ceil($n);

if ($n > 1){
    // if isset page
    if (isset($_GET['page'])){
           $p = $_GET['page'];
        
        //if pages is not created
        echo '<ul class="pagination pagination-sm">';
        if($n <= 5){
            //create pages
            for ($b = 1; $b <= $n; $b++){           
                if($p == 1 && $b == 1){
                    echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                } else {
                    if($p == $b){
                        echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                    }
                    
                }

            }
        
        } else {
           if($p > 1){
              echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page=1"><b><<</b> </a></li>'; 
              echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.($p-1).'"><b><</b> </a></li>';
           }
                
                
        
            //create pages
            for ($b = $p; $b <= $p+5; $b++){ 
                //limit till avilabel pages
                if ($b <= $n){
                    if($p == 1 && $b == 1){
                        echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                    } else {
                        if($p == $b){
                            echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                        }
                    }
                }
                

            }
            if(($p+5) < $n){
                echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.($p+1).'"><b>></b> </a></li>';
                echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$n.'"><b>>></b> </a></li>'; 
            }
            
        }
        
        echo '</ul>'; 
                
    } else {
        
        //if pages is not created
        echo '<ul class="pagination pagination-sm">';
        
        if($n <= 5){
            //create pages
            for ($b = 1; $b <= $n; $b++){           
                if($b == 1){
                    echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                }

            }
        
        } else {
            //create pages
            for ($b = 1; $b <= 5; $b++){           
                if($b == 1){
                    echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$b.'"><b>'.$b.'</b> </a></li>';
                }

            }
            echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page=6"><b>></b> </a></li>';
            echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$n.'"><b>>></b> </a></li>';
        }
         
        echo '</ul>';
        
    }   
}
//create page end