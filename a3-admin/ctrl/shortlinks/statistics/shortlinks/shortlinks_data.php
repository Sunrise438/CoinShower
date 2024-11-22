<div class="container mt-3 mb-3">
    <table class="table table-hover">
    
    <tbody>
        <tr>
            <td><?php echo ucfirst($linkName);?></td>
            <td><a href="<?php echo $site_info_row['site_url'].'/shortlinks?q='.$shortlinks_info['link']?>" target="_blank"><?php echo $site_info_row['site_url'].'/shortlinks?q='.$shortlinks_info['link']?></a></td>
        </tr>
        
        <tr>
            <td><?php echo ucfirst($shortlinksName);?></td>
            <td><a href="<?php echo $shortlinks_info['shortlinks']?>" target="_blank"><?php echo $shortlinks_info['shortlinks']?></a></td>
        </tr>
        
        <tr>
            <td><?php echo ucfirst($referralsName).' '. ucfirst($linkName);?></td>
            <td><a href="<?php echo $shortlinks_info['ref_shortlinks']?>" target="_blank"><?php echo $shortlinks_info['ref_shortlinks']?></a></td>
        </tr>
    </tbody>
    </table>
</div>