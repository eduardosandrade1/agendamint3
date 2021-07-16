<?php
    include '../config.php';
    $descricao          = $_POST['servico-new-descricao'];
    $empresaID          = $_SESSION['empresa_id'];
    $valor              = $_POST['servico-new-preco'];
    $servico            = new Servico();
    $insertService      = $servico->insert(array(
        ':descricao'    => $descricao,
        ':empresa_id'   => $empresaID,
        ':valor'        => $valor
    ));

    if($insertService){
        header('location:principal.php?link=5');
        return;
    }
    header('location:principal.php?link=404');
