<?php
    if($_SESSION['nivel_acesso'] == USER_MASTER){
        $funcionarios   = new Funcionario();
        $funcionarios->setEmpresaId($_SESSION['empresa_id']);
        $qtdFuncionario = count($funcionarios->getAll());
    }
    $users      = new User();
    $qtdUser    = count($users->getAll());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="content">
        <div class="header text-center">
            <h1>Bem vindo <?= $_SESSION['nome'] ?></h1>
        </div>
        <?php if($_SESSION['nivel_acesso'] != USER_MASTER){ ?>
            <div class="card" style="width: 18rem;">
                <div class="card-header bg-danger text-light text-center">
                    Usuários
                </div>
                <div class="card-body text-center">
                    <label><?= $qtdUser ?></label>
                </div>
                <div class="card-footer text-center">
                    <a href="principal.php?link=2" class="btn btn-danger">Acessar</a>
                </div>
            </div>
        <?php } ?>

        <?php if($_SESSION['nivel_acesso'] == USER_MASTER){ ?>
            <div class="card" style="width: 18rem;">
                <div class="card-header bg-danger text-light text-center">
                    Funcionários
                </div>
                <div class="card-body text-center">
                    <label><?= $qtdFuncionario ?></label>
                </div>
                <div class="card-footer text-center">
                    <a href="principal.php?link=3" class="btn btn-danger">Acessar</a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>