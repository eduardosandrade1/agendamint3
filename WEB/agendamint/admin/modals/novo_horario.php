<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="novo-func-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="h4">Novo horário</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="op_horario.php" method="post">

            <div class="form-group">
              <label for="message-text" class="col-form-label">Escolha o cliente:</label>
              <select name="cliente-new-user" class="form-control">
                <?php foreach ($usersByCompany as $us => $user) {?>
                  <option value="<?= $user['id'] ?>"><?= $user['nome'] . " - " . $user['email'] ?></option>
                <?php } ?>
              </select>
            </div>

            <!-- opção de serviço -->
            <div class="form-group">
              <label for="message-text" class="col-form-label">Escolha o tipo de serviço: </label>
              <select name="servico-new-hr" class="form-control">
              <?php foreach ($servicos as $s => $serv) {?>
                  <option value="<?= $serv['id'] ?>"><?= $serv['descricao'] ?></option>
                <?php } ?>
              </select>
            </div>
          <!-- data agendamento -->
            <div class="row">
              <div class="col">
                <label for="message-text" class="col-form-label">Dia para agendamento:</label>
                <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="dia-new-hr" required>
              </div>
              <div class="col">
                <label for="message-text" class="col-form-label">Horário:</label>
                <input type="time" class="form-control" name="hora-new-hr" min="<?= date("H:i") ?>" required>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>