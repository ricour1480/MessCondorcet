<?php

if(file_exists('./admin/lib/php/pgConnect.php')) {
    include ('./admin/lib/php/pgConnect.php');
    include ('./admin/lib/php/autoload.php');
}
else if(file_exists('./lib/php/pgConnect.php')){
    include ('./lib/php/pgConnect.php');
    include ('./lib/php/autoload.php');
}
