<?php 
    $usr = new Funcionario();
    $usr->setEmpresaId($_SESSION['empresa_id']);
    $users = $usr->getAll();
?>
<h1>Funcionários</h1>
<div class="panel panel-default">
    <div class="panel-heading text-center bg-secondary">
        <div class="h4 text-light">Lista de funcionários</div>
        <div class="text-right">
            <button class="btn bg-danger text-light btn-add-func" data-toggle="modal" data-target="#novo-func">+ Novo</button>
        </div>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Nome</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">CPF</th>
                    <th class="text-center" scope="col">Login</th>
                    <th class="text-center" scope="col" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $key => $value){ ?>
                    <tr>
                        <th class="text-center" scope="row"><?= $users[$key]['id'] ?></th>
                        <td class="text-center"><?= $users[$key]['nome'] ?></td>
                        <td class="text-center"><?= $users[$key]['email'] ?></td>
                        <td class="text-center"><?= $users[$key]['cpf'] ?></td>
                        <td class="text-center"><?= $users[$key]['login'] ?></td>
                        <td class="text-center"><a href="#" class="edit-func" data-id="<?= $users[$key]['id'] ?>">Editar</a></td>
                        <td class="text-center"><a href="#" class="excluir-func" data-id="<?= $users[$key]['id'] ?>">Excluir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'modals/novo_funcionario.php'; ?>
<script>
    $(document).ready(function () { 
        var $seuCampoCpf = $("input[name=func-new-cpf]");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    });
</script>
