<?php
    include '../config.php';
    $empresaID      = $_SESSION['empresa_id'];
    $nome           = $_POST['func-new-name'];
    $cpf            = $_POST['func-new-cpf'];
    $email          = $_POST['func-new-email'];
    $login          = $_POST['func-new-login'];
    $senha          = $_POST['func-new-senha'];
    $rpSenha        = $_POST['func-new-repita-senha'];
    $func           = new Funcionario();
    $func->setEmpresaId($empresaID);
    $funcionarios   = $func->getAll();

    // testando se existe um cpf já cadastrado
    foreach ($funcionarios as $funcionario) {
        if($funcionario['cpf'] == $cpf){
            header('location:principal.php?link=3?msg=cpf%ja%existente');
        }
    }
    // testando senhas repetidas
    if($senha =! $rpSenha){
        header('location:principal.php?link=3?msg=senhas%não%coincidem');
    }

    // caso passe por todas as verificações, insere
    $insertFunc = $func->insert(array(
        ':empresa_id'       => $func->getEmpresaId(),
        ':nivel_acesso_id'  => intval(USER_FUNCIONARIO),
        ':nome'             => $nome,
        ':cpf'              => $cpf,
        ':login'            => $login,
        ':senha'            => $senha,
        ':email'            => $email
    ));
    if($insertFunc){
        header('location: principal.php?link=3');
    }else{
        header('location: principal.php?link=3?teste');
    }