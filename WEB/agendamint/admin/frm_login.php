<?php 
    include('../constants.php'); 
    include ('../admin/header.php');
?>

<body>
    <div class="body">
    <div class="frm_login">
        <div class="title_login text-center">
            <h1><?= APP_NAME ?></h1>
        </div>
        <form action="op_login.php" method="post">
        <div class="form-group">
            <label for="">Login: </label>
            <input type="text" class="form-control" name="login" required>
            <label for="" class="label-control">Senha </label>
            <input type="password" class="form-control" name="pws" required>
            <button class="btn btn-primary btn-entrar" align="center">Entrar</button>
        </div>
        <div class="resultado text-center ">
            <?= (isset($_GET['msg']) && !empty($_GET['msg']))?  '<span class="text-danger">Dados não encontrado!</span>' : '<span></span>' ; ?>
        </div>
        </form>
        <div class="new-cadastro text-right">
            <a href="frm_cadastro.php"><strong>></strong> Solicitar Aplicação</a>
        </div>
    </div>
    </div>
</body>
</html>