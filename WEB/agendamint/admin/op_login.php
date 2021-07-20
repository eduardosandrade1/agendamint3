<?php

    include '../config.php';

    // var_dump($_POST);
    $user       = $_POST['login'];
    $senha      = md5($_POST['pws']);
    $login      = new Funcionario();
    $company    = new Empresa();
    // var_dump($_POST);die;

    $users = $login->getSpecificFuncionario($user, $senha);
    // var_dump($users);
    // die;
    if(count($users) > 0){
        $_SESSION['logado']         = true;
        $_SESSION['user_id']        = $users[0]['id'];
        $_SESSION['nome']           = $users[0]['nome'];
        $_SESSION['nivel_acesso']   = $users[0]['nivel_acesso_id'];
        $_SESSION['empresa_id']     = $users[0]['empresa_id'];
        $_SESSION['new_empresa']    = $company->getById($users[0]['empresa_id'])[0]['nova'];
        // var_dump($company->getById($users[0]['empresa_id'])[0]['nova']);die;
        $_SESSION['color_primary']  = $company->getById($users[0]['empresa_id'])[0]['cor_primaria'];
        $_SESSION['color_secondary']= $company->getById($users[0]['empresa_id'])[0]['cor_secundaria'];
        $_SESSION['color_tertiary'] = $company->getById($users[0]['empresa_id'])[0]['cor_terciaria'];
        $login->setEmpresaId($users[0]['empresa_id']);
        
        if($_SESSION['new_empresa'] == NEW_COMPANY){
            header('location: principal.php?link=1');
        }else{
            header('location: frm_inicial.php');
        }
    }else{
        header('location: frm_login.php?msg=notFound');
    }