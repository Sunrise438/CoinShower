<?php

//surf table data

//page limit
require 'interface/page_limit.php';

require 'surf_history_select.php';
require 'surf_history_table.php';

//pages
if (isset($_GET['t'])){
    if ($_GET['t'] == 'today'){
        require 'interface/pager_parameter_by_count_username.php';
    } else {
        require 'interface/pager_parameter.php';
    }
    
} else {
    require 'interface/pager_parameter.php';
}