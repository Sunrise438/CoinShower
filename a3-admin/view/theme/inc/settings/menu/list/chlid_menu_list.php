<ul class="list1 list-group ms-4">
    <?php
    $child_menu = listMenuChild($menu_row['id'], $menu_row['type']);
    if ($child_menu != 0){
        foreach ($child_menu AS $menu_child_row){
                ?>
        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold
        <?php 
        if ($menu_child_row['relation'] == 'd'){
            echo 'bg-dark bg-gradient bg-opacity-50';
        }else if ($menu_child_row['relation'] == 'p'){
            echo 'bg-primary bg-gradient bg-opacity-75';
        }else if ($menu_child_row['relation'] == 'c'){
            echo 'bg-primary bg-gradient bg-opacity-50';
        }
        ?>
        ">
        <div class="d-flex">
            <div class="me-3"><?php echo $menu_child_row['id'];?></div>
            <div><?php echo $menu_child_row['name'];?></div>
        </div>
        </li>
        <?php
        }
    }
    ?>
</ul>