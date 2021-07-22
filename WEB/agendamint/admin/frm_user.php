<?php 
    $usr        = new User();
    $users      = $usr->getAll();
    $servico    = new Servico();
    $servicos   = $servico->getByCompany($_SESSION['empresa_id']);
?>
<h1 class="text-center">Usuários</h1>
<div class="panel panel-default">
    <div class="panel-heading text-center bg-secondary">
        <div class="h4 text-light">Lista de usuários</div>
        <div class="text-right">
            <button class="btn bg-danger text-light btn-add-user" data-toggle="modal" data-target="#exampleModal">+ Novo</button>
        </div>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Nome</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">usuário/login</th>
                    <th class="text-center" scope="col" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $key => $value){ ?>
                    <tr>
                        <th class="text-center" scope="row"><?= $users[$key]['id'] ?></th>
                        <td class="text-center"><?= $users[$key]['nome'] ?></td>
                        <td class="text-center"><?= $users[$key]['email'] ?></td>
                        <td class="text-center"><?= $users[$key]['login'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-default btn-edit btn-xs" data-toggle="modal" data-target="#modalEditUser">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-default btn-delete btn-xs">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'modals/novo_user.php'; ?>
<?php include 'modals/edit_usuario.php'; ?>
