<?php
    if($_SESSION['nivel_acesso'] == USER_MASTER){
        $funcionarios       = new Funcionario();
        $servicosCompany    = new Servico();
        $funcionarios->setEmpresaId($_SESSION['empresa_id']);
        $qtdFuncionario     = count($funcionarios->getAll());
        $qtdServicos        = count($servicosCompany->getByCompany($_SESSION['empresa_id']));

    }else if($_SESSION['nivel_acesso'] == USER_FUNCIONARIO){
        $agendamento        = new Agendamento();

        $qtdAgenda          = count($agendamento->getByFuncionario($_SESSION['user_id']));
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
            <div class="content-cards">
                <div class="card" style="width: 18rem;">
                    <div class="card-header bg-danger text-light text-center">
                        Usuários
                    </div>
                    <div class="card-body text-center">
                        <label class="h3"><?= $qtdUser ?></label>
                    </div>
                    <div class="card-footer text-center">
                        <a href="principal.php?link=2" class="btn btn-danger">Acessar</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-header bg-primary text-light text-center">
                        Agenda
                    </div>
                    <div class="card-body text-center">
                        <label class="h3"><?= $qtdAgenda ?></label>
                    </div>
                    <div class="card-footer text-center">
                        <a href="principal.php?link=4" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if($_SESSION['nivel_acesso'] == USER_MASTER){ ?>
        <div class="content-cards">
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
            <!-- serviços -->
            <div class="card" style="width: 18rem;">
                <div class="card-header bg-warning text-light text-center">
                    Serviços
                </div>
                <div class="card-body text-center">
                    <label class="h3"><?= $qtdServicos ?></label>
                </div>
                <div class="card-footer text-center">
                    <a href="principal.php?link=5" class="btn btn-warning">Acessar</a>
                </div>
            </div>            
        </div>

        <?php } ?>
    </div>
</body>
</html>