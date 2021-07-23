<?php

    use chillerlan\QRCode\QRCode;
    include './vendor/autoload.php';

    $chave     = $_SESSION['dados_empresa'][0]['chave_pix'];
    $email     = $_SESSION['dados_empresa'][0]['email'];

    $obPayload = new Payload;
    $obPayload->setPixKey('46530022821');
    $obPayload->setDescription('teste payload');
    $obPayload->setMerchantName('Eduardo Andrade');
    $obPayload->serMerchantCity('SAO PAULO');
    $obPayload->setAmout(20.00);
    $obPayload->setTxId('tst1');
    

    $payloadQrCode = $obPayload->getPayload();


    // quick and simple:
    echo '<img src="'.(new QRCode)->render($payloadQrCode).'" alt="QR Code" />';
    

?>
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
    
    <script src="../admin/js/actions.js"></script>
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js'></script>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">

    <title>Cadastro</title>
</head>
<body>
    <div class="content">
        <div class="header text-center">
            <h1>Editar dados da empresa</h1>
        </div>
            <form action="op_initial.php" method="POST">
                <div class="form-group">
                    <label for="tipo_chave_pix">O tipo de chave pix que deseja cadastrar:</label>
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
                    <input type="text" name="chave_pix" class="form-control" value="<?= $chave ?>">
                </div>
                <div class="form-group">
                    <label for="">Nos diga qual é o banco:</label>
                    <select name="nome-banco" class="form-control" id="">

                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Cor primária:</label>
                        <input type="color" class="form-control form-control-color" name="primary-color" value="<?= $_SESSION['color_primary'] ?>">
                    </div>
                    <div class="col">
                        <label for="">Cor secundária:</label>
                        <input type="color" class="form-control form-control-color" name="second-color" value="<?= $_SESSION['color_secondary'] ?>">
                    </div>
                    <div class="col">
                        <label for="">Cor terciária:</label>
                        <input type="color" class="form-control form-control-color" name="tertiary-color" value="<?= $_SESSION['color_tertiary'] ?>">
                    </div>
                </div>

                    <div class="form-group">
                        <label for="">Seu email corporativo:</label>
                        <input type="text" class="form-control" name="email-coorporativo" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-cadastro">Enviar</button>
                    </div>
            </form>
            
    </div>
</body>
</html>