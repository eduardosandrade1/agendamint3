<?php
session_start();
date_default_timezone_set("America/Sao_Paulo");
//ignoring session_start();
spl_autoload_register(function($classe){
    $classe      = __DIR__ . "/admin/class/" . $classe . ".php";

    if(file_exists($classe)){
        require_once($classe);
    }
});
