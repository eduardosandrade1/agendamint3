<?php 
    $agenda         = new Agendamento();
    $usuario        = new User();
    $servico        = new Servico();
    $servicos       = $servico->getByCompany($_SESSION['empresa_id']);
    $fullAgenda     = $agenda->getByFuncionario($_SESSION['user_id']);
    $usersByCompany = $usuario->getByCompany($_SESSION['empresa_id']);

    // var_dump($fullAgenda);die;
?>
<h1 class="text-center">SUA AGENDA</h1>
<div class="panel panel-default">
    <div class="panel-heading text-center bg-secondary">
        <div class="h4 text-light">Lista de agendas</div>
        <div class="text-right">
            <button class="btn bg-danger text-light btn-add-user" data-toggle="modal" data-target="#modalAgenda">+ Novo</button>
        </div>
    </div>

    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Cliente</th>
                    <th class="text-center" scope="col">Data</th>
                    <th class="text-center" scope="col">Serviço</th>
                    <th class="text-center" scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fullAgenda as $key => $agenda){ 
                    $dataComparativa = explode(":", $agenda['data_marcada']);
                    $dataComparativa = $dataComparativa[0].":".$dataComparativa[1].":00";

                    if(date("Y-m-d H:i:s") >  $dataComparativa){

                        $colorDate = "text-danger";

                    }else if(strval(date("Y-m-d H:i:s")) ==  $dataComparativa){

                        $colorDate = "text-warning";

                    }else{

                        $colorDate = "text-success";

                    }
                    ?>
                    <tr>
                        <th class="text-center" scope="row"><?= $agenda['id'] ?></th>
                        <td class="text-center"><?= $usuario->getById($agenda['usuario_id'])[0]['nome'] ?></td>
                        <td class="text-center <?= $colorDate ?>"><?= $agenda['data_marcada'] ?></td>
                        <td class="text-center"><?= $servico->getById($agenda['servico_id'])[0]['descricao'] ?></td>
                        <td class="text-center">R$ <?=  number_format($servico->getById($agenda['servico_id'])[0]['valor'], 2, ',', '.') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'modals/novo_horario.php'; ?>
<script>
    $(document).ready(function () { 
        var $seuCampoCpf = $("input[name=func-new-cpf]");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    });
</script>
