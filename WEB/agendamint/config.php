<?php
session_start();
//ignoring session_start();
spl_autoload_register(function($classe){
    $classe      = __DIR__ . "/admin/class/" . $classe . ".php";

    if(file_exists($classe)){
        require_once($classe);
    }
});
