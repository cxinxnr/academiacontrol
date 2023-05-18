<?php
    include('layout/header.php');

    if(file_exists("views/$ação.view.php")):
        include("views/$ação.view.php");
    else :
        include("layout/404.php");
    endif;
    
        include("layout/footer.php");