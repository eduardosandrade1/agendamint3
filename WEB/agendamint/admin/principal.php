<?php 
    require_once("../config.php");
    if(!isset($_SESSION['logado']) && $_SESSION['logado'] == false){
        header('Location: index.php');
    }
    $niveis = new NivelUser();
    $dados['nivel_users'] = $niveis->getAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
<body>

    <div id="principal">
        <div id="cabecalho">

        </div> <!-- final do cabeçalho -->
        <div id="corpo">
            <div id="esquerdo">
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
                            $pag[1]="dashboard.php";
                            $pag[2]="frm_user.php";
                            $pag[3]="frm_funcionarios.php";
                            $pag[4]="frm_post.php";
                            $pag[5]="lista_post.php";
                            $pag[6]="frm_noticia.php";
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
</html>