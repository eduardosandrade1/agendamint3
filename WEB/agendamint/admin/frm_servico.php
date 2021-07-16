<?php 
    $servico    = new Servico();
    $servicos   = $servico->getByCompany($_SESSION['empresa_id']);
?>
<h1 class="text-center">Serviço</h1>
<div class="panel panel-default">
    <div class="panel-heading text-center bg-secondary">
        <div class="h4 text-light">Todos os serviços</div>
        <div class="text-right">
            <button class="btn bg-danger text-light btn-add-user" data-toggle="modal" data-target="#novo-serv">+ Novo</button>
        </div>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Descrição</th>
                    <th class="text-center" scope="col">Preço (R$)</th>
                    <th class="text-center" scope="col" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($servicos as $key => $value){ ?>
                    <tr>
                        <th class="text-center" scope="row"><?= $value['id'] ?></th>
                        <td class="text-center"><?= $value['descricao'] ?></td>
                        <td class="text-center">R$ <?= number_format($value['valor'], 2, ',', '.') ?></td>
                        <td class="text-center"><a href="#">Editar</a></td>
                        <td class="text-center"><a href="#">Excluir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'modals/novo_servico.php'; ?>
