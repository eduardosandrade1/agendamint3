<?php 
    require_once("../config.php");
    if(!isset($_SESSION['logado']) && $_SESSION['logado'] == false){
        header('Location: index.php');
    }
    $niveis = new NivelUser();
    $dados['nivel_users'] = $niveis->getAll();
    // var_dump($_SESSION);die;
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php if($_SESSION['new_empresa'] == NEW_COMPANY){ ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        <!-- Fontes  -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
        <!-- estilo páginas -->
        <link rel="stylesheet" href="css/style.css">
        <script src="js/actions.js"></script>
        <title>Área Adminstrativa</title>

    </head>
    <body style="background-color:<?= $_SESSION['color_secondary'] ?>">

        <div id="principal">
            <div id="cabecalho">

            </div> <!-- final do cabeçalho -->
            <div id="corpo">
                <div id="esquerdo" style="background-color:<?= $_SESSION['color_primary'] ?>">
                    <!-- Menu lateral  -->
                    <?php include 'menu_lateral.php'; ?>
                </div> <!-- final do esquerdo -->
                <div id="direito">
                    <div class="menu-topo">
                            <a href="logout.php">Sair</a>
                        </div>
                    <div class="content">
                        <?php
                            if(isset($_GET['link'])){
                                $link = $_GET['link'];
                                $pag[404]="../404.php";
                                $pag[1]="dashboard.php";
                                $pag[2]="frm_user.php";
                                $pag[3]="frm_funcionarios.php";
                                $pag[4]="frm_agenda.php";
                                $pag[5]="frm_servico.php";
                                $pag[6]="frm_empresa.php";
                                $pag[7]="lista_noticia.php";
                                $pag[8]="frm_administrador.php";
                                $pag[9]="lista_administrador.php";
                                $pag[10]="frm_usuario.php";
                                $pag[11]="lista_usuario.php";
                                if (!empty($link)){
                                    if(file_exists($pag[$link])){
                                        include $pag[$link];
                                    }
                                    else{
                                        include $pag[1];
                                    }
                                }
                            }
                            else{
                                include "dashboard.php"; 
                            }
                        ?> 
                    </div>

                </div> <!-- final do direito -->
            </div>
        </div>
        
    </body>
<?php }else{
    header('location:frm_inicial.php');// '../admin/frm_inicial.php';
} ?>
</html>