<?php  ?>

<div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="h4">Editar usuário</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="op_user.php" method="post">
          <!-- Nome do usuário -->
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" name="name-new-user" required>
            </div>
            <!-- usuário/login do usuário -->
            <div class="form-group">
                <label for="message-text" class="col-form-label">Usuario/login:</label>
                <input class="form-control" name="user-new-user" required>
            </div>
            <!-- email -->
            <div class="form-group">
                <label for="message-text" class="col-form-label">Email:</label>
                <input class="form-control" name="email-new-user" required>
            </div>
            <!-- opção de serviço -->
            <div class="form-group">
              <label for="message-text" class="col-form-label"></label>
              <select name="servico-new-user" class="form-control">
                <?php foreach ($servicos as $s => $serv) {?>
                  <option value="<?= $serv['id'] ?>"><?= $serv['descricao'] ?></option>
                <?php } ?>
              </select>
            </div>
          <!-- data agendamento -->
            <div class="row">
              <div class="col">
                <label for="message-text" class="col-form-label">Dia para agendamento:</label>
                <input type="date" class="form-control" name="dia-new-user" required>
              </div>
              <div class="col">
                <label for="message-text" class="col-form-label">Horário:</label>
                <input type="time" class="form-control" name="hora-new-user" required>
              </div>
            </div>
            <!-- send the form -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>