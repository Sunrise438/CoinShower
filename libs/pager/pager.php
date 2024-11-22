<?php

/*
 * pager
 */
function pager($count, $pagename, $page = NULL, $parameters = NULL){
    $n = $count/$GLOBALS['site_info_row']['page_limit'];
    $n = ceil($n);
    
    if ($n > 1){
        /*
         * if isset page
         */
        if (isset($page)){
               $p = $page;

            /*
             * if pages is not created
             */
            echo '<ul class="pagination pagination-sm justify-content-center">';
            if($n <= 5){
                /*
                 * create pages
                 */
                for ($b = 1; $b <= $n; $b++){           
                    if($p == 1 && $b == 1){
                        echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                    } else {
                        if($p == $b){
                            echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                        }

                    }

                }

            } else {
               if($p > 1){
                  echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page=1'.$parameters.'"><b><<</b> </a></li>'; 
                  echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.($p-1).$parameters.'"><b><</b> </a></li>';
               }

                /*
                 * create pages
                 */
                for ($b = $p; $b <= $p+5; $b++){ 
                    //limit till avilabel pages
                    if ($b <= $n){
                        if($p == 1 && $b == 1){
                            echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                        } else {
                            if($p == $b){
                                echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                            }
                        }
                    }


                }
                if(($p+5) < $n){
                    echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.($p+1).$parameters.'"><b>></b> </a></li>';
                    echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$n.$parameters.'"><b>>></b> </a></li>'; 
                }

            }

            echo '</ul>'; 

        } else {

            /*
             * if pages is not created
             */
            echo '<ul class="pagination pagination-sm justify-content-center">';

            if($n <= 5){
                //create pages
                for ($b = 1; $b <= $n; $b++){           
                    if($b == 1){
                        echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                    }

                }

            } else {
                /*
                 * create pages
                 */
                for ($b = 1; $b <= 5; $b++){           
                    if($b == 1){
                        echo '<li class="page-item active"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$b.$parameters.'"><b>'.$b.'</b> </a></li>';
                    }

                }
                echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page=6'.$parameters.'"><b>></b> </a></li>';
                echo '<li class="page-item"><a class="page-link" href="'.$pagename.'?page='.$n.$parameters.'"><b>>></b> </a></li>';
            }

            echo '</ul>';

        }   
    }
}
