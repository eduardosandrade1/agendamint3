<?php
    include '../config.php';

    $tipoChave = $_POST['tipo_chave_pix'];
    $chave     = $_POST['chave_pix'];
    $banco     = $_POST['nome-banco'];
    $primary   = $_POST['primary-color'];
    $second    = $_POST['second-color'];
    $terty     = $_POST['tertiary-color'];
    $email     = $_POST['email-coorporativo'];
    $company   = new Empresa();
    // $query = "UPDATE empresa SET chave_pix = :chave_pix, tipo_chave_pix = :tipo_chave_pix, banco = :banco, cor_primaria = :cor_primaria, cor_secundaria= :cor_secundaria, cor_terciaria = :cor_terciaria WHERE id = $idEmpresa";

    $cmd = $company->update($_SESSION['empresa_id'], array(
        ':chave_pix'        => $chave,
        ':tipo_chave_pix'   => $tipoChave,
        ':banco'            => $banco,
        ':cor_primaria'     => $primary,
        ':cor_secundaria'   => $second,
        ':cor_terciaria'    => $terty,
        ':email'            => $email,
        ':nova'             => 1
    ));
    if($cmd){
        $_SESSION['new_empresa']        = NEW_COMPANY;
        $_SESSION['color_primary']      = $primary;
        $_SESSION['color_secondary']    = $second;
        $_SESSION['color_tertiary']     = $terty;
        $_SESSION['dados_empresa']      = $company->getById($_SESSION['empresa_id']);
    }
    header("location: principal.php?link=1");
    // var_dump($cmd);die;