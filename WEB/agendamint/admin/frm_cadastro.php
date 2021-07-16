<?php include('../constants.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Fontes  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <div class="body">
    <div class="back-login">
        <a href="frm_login.php">Voltar</a>
    </div>
    <div class="frm_login">
        <div class="title_login text-center">
            <h1><?= APP_NAME ?></h1>
        </div>
        <br>
        <div class="descricao">
            <h4 class="text-center">Solicite sua aplicação!</h4>
            <h6>Faça seu cadastro, analisaremos e entraremos em contato o mais breve possível!</h6>
        </div>
        <br><br>
        <form action="op_cadastro.php" method="post">
        <div class="form-group">
            <label for="">Email: </label>
            <input type="text" class="form-control" name="email" required>
            <button class="btn btn-primary btn-entrar" align="center">Entrar</button>
        </div>
        <div class="resultado text-center">
            <?= (isset($_GET['msg']) && !empty($_GET['msg']))?  '<span class="text-danger">Dados não encontrado!</span>' : '<span></span>' ; ?>
        </div>
        </form>
    </div>
    </div>
</body>
</html>