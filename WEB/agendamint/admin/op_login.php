<?php

    include '../config.php';

    // var_dump($_POST);
    $user  = $_POST['login'];
    $senha = md5($_POST['pws']);
    $login = new Funcionario();
    // var_dump($_POST);die;

    $users = $login->getSpecificFuncionario($user, $senha);
    // var_dump($users);
    // die;
    if(count($users) > 0){
        $_SESSION['logado']         = true;
        $_SESSION['nome']           = $users[0]['nome'];
        $_SESSION['nivel_acesso']   = $users[0]['nivel_acesso_id'];
        $_SESSION['empresa_id']     = $users[0]['empresa_id'];
        $login->setEmpresaId($users[0]['empresa_id']);
        header('location: principal.php?link=1');
    }else{
        header('location: frm_login.php?msg=notFound');
    }