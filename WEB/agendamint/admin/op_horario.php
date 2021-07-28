<?php
    include '../config.php';

    $dataMarcada    = $_POST['dia-new-hr'] . " ". $_POST['hora-new-hr'];
    $funcionarioID  = $_SESSION['user_id'];
    $servicoID      = $_POST['servico-new-hr'];
    $idCliente      = $_POST['cliente-new-user'];

    $agenda         = new Agendamento();
    $result = $agenda->insert($idCliente, array(
        ':funcionario_id'   => $funcionarioID,
        ':data_marcada'     => $dataMarcada,
        ':servico_id'       => $servicoID
    ));

    if($result){
        header('location:principal.php?link=4');
    }
