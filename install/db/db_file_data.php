<?php

$myfile = fopen("../config/config.php", "w") or die("Unable to open file!");
$txt = "<?php\n\n"
        . "$"
        . "servername"
        . " ="
        . " '"
        . $this->isevername
        . "'"
        . ";\n"
        . "$"
        . "username"
        . " ="
        . " '"
        . $this->idbuser
        . "'"
        . ";\n"
        . "$"
        . "password"
        . " ="
        . " '"
        . $this->idbpass
        . "'"
        . ";\n"
        . "$"
        . "dbname"
        . " ="
        . " '"
        . $this->idbname
        . "'"
        . ";\n"
        . "$"
        . "gp"
        . " = "
        . "'"
        . "';\n\n"
        . "$"
        . "conn"
        . " ="
        . " new"
        . " mysqli"
        . "("
        . "$"
        . "servername"
        . ", "
        . "$"
        . "username"
        . ", "
        . ""
        . "$"
        . "password"
        . ", "
        . "$"
        . "dbname"
        . ")"
        . ";\n\n"
        . "if"
        . "("
        . "$"
        . "conn"
        . "-"
        . ">"
        . "connect"
        . "_"
        . "error"
        . ") "
        . "{\n"
        . "   die "
        . "("
        . ")"
        . ";\n"
        . "}";
fwrite($myfile, $txt);
fclose($myfile);

/*
 * admin config file create
 */
$myfile_admin = fopen("../a3-admin/config/config.php", "w") or die("Unable to open file!");
fwrite($myfile_admin, $txt);
fclose($myfile_admin);
