<?php

//select banned doamin
$banned_domain = bannnedDomainInfoById($token);

if (isset($banned_domain)){
    bannnedDomainChangeStatus($token, 0);

}

header('location:banned_domain');