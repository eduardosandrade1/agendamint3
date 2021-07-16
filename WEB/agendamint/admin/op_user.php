<?php
    include '../config.php';

    $funcionarioID  = $_SESSION['user_id'];
    $data_marcada   = $_POST['dia-new-user']." ". $_POST['hora-new-user'];
    $servicoID      = $_POST['servico-new-user'];
    $senha          = $_POST['senha-new-user'];
    $repitaSenha    = $_POST['senha-repita-new-user'];
    $user   = new User();

    if($senha != $repitaSenha){
        return json_encode(array("success" => false, "msg" => "As senhas não coincidem!"));
    }
    $insertUser = $user->insertWithScheduling(array(
            ':nome'             => $_POST['name-new-user'],
            ':email'            => $_POST['email-new-user'],
            ':login'            => $_POST['user-new-user'],
            ':senha'            => md5($senha),
            ':nivel_acesso'     => 4
        ), array(
            ':funcionario_id'   => $funcionarioID,
            ':data_marcada'     => $data_marcada,
            ':servico_id'       => $servicoID
        ));
    if($insertUser){
        header('location: principal.php?link=2');
    }