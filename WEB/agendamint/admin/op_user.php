<?php
    include '../config.php';

    $funcionarioID  = $_SESSION['user_id'];
    $empresaID      = $_SESSION['empresa_id'];
    $data_marcada   = $_POST['dia-new-user']." ". $_POST['hora-new-user'];
    $servicoID      = $_POST['servico-new-user'];
    $senha          = $_POST['senha-new-user'];
    $repitaSenha    = $_POST['senha-repita-new-user'];
    $user   = new User();

    if($senha != $repitaSenha){
        return json_encode(array("success" => false, "msg" => "As senhas não coincidem!"));
    }
    $insertUser = $user->insert(array(
            ':nome'             => $_POST['name-new-user'],
            ':email'            => $_POST['email-new-user'],
            ':login'            => $_POST['user-new-user'],
            ':senha'            => md5($senha),
            ':empresa_id'       => $empresaID
        ));
    if($insertUser){
        header('location: principal.php?link=2');
    }