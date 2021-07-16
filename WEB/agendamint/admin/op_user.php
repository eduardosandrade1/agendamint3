<?php
    include '../config.php';

    $senha       = $_POST['senha-new-user'];
    $repitaSenha = $_POST['senha-repita-new-user'];
   
    $user   = new User();

    if($senha != $repitaSenha){
        return json_encode(array("success" => false, "msg" => "As senhas não coincidem!"));
    }
    $insertUser = $user->insert(array(
            ':nome'             => $_POST['name-new-user'],
            ':email'            => $_POST['email-new-user'],
            ':login'            => $_POST['user-new-user'],
            ':senha'            => md5($senha),
            ':nivel_acesso'     => USER_COMUM
        ));
    if($insertUser){
        header('location: principal.php?link=2');
    }