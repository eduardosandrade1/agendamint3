<?php include '../config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">

    <title>Cadastro</title>
</head>
<body class="bg-primary">
    <div class="content">
        <div class="header text-center">
            <h1>Bem vindo <?= $_SESSION['nome'] ?></h1>
        </div>
        <div class="infos-cadastro text-center">
            <br><br><br><br><br>
            <p>Para começar, precisamos que nos informe alguns dados da sua empresa para configirar todo o ambiente.</p>
        </div>
        <div class="frm_cad_initial">
            <label for="" class="h3">Nos informe:</label>
            <form action="op_initial.php" method="POST">
                <!-- primeira parte -->
                <div class="first-party">
                    <div class="form-group">
                        <label for="">O tipo de chave pix que deseja cadastrar:</label>
                        <select name="tipo_chave_pix" id="" class="form-control">
                            <option value="">------ SELECIONE ------</option>
                            <option value="1">Email</option>
                            <option value="2">CPF</option>
                            <option value="3">Telefone</option>
                            <option value="4">Chave aleatórioa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Informe a chave:</label>
                        <input type="text" name="chave_pix" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nos diga qual é o banco:</label>
                        <select name="nome-banco" class="form-control" id="">

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-next pull-right">Próximo</button>
                    </div>
                </div>

                <!-- segunda parte  -->
                <div class="second-party" style="display:none">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-voltar">Voltar</button>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="">Cor primária:</label>
                            <input type="color" class="form-control form-control-color" name="primary-color">
                        </div>
                        <div class="form-group">
                            <label for="">Cor secundária:</label>
                            <input type="color" class="form-control form-control-color" name="second-color">
                        </div>
                        <div class="form-group">
                            <label for="">Cor terciária:</label>
                            <input type="color" class="form-control form-control-color" name="tertiary-color">
                        </div>
                        <div class="form-group">
                            <label for="">Seu email corporativo:</label>
                            <input type="text" class="form-control" name="email-coorporativo">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-cadastro">Enviar</button>
                        </div>
                    </div>


                </div>

            </form>
            
        </div>
    </div>
    <script src="../admin/js/actions.js"></script>
    <script>
        $(document).ready(function () { 
            // var $seuCampoCpf = $("input[name=func-new-cpf]");
            // $seuCampoCpf.mask('000.000.000-00', {reverse: true});
        });
    </script>
</body>
</html>