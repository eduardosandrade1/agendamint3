<div class="modal fade" id="novo-func" tabindex="-1" role="dialog" aria-labelledby="novo-func-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="h4">Novo funcionário</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="op_funcionario.php" method="post">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" name="func-new-name" required>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">CPF:</label>
                <input type="text" class="form-control" name="func-new-cpf" maxlength="14" required>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Email:</label>
                <input class="form-control" name="func-new-email" required>
            </div>

            <div class="form-group">
                <label for="message-text" class="col-form-label">Login:</label>
                <input type="text" class="form-control" name="func-new-login" required>
            </div>            
            <div class="form-group">
                <label for="message-text" class="col-form-label">Senha:</label>
                <input type="password" class="form-control" name="func-new-senha" required>
            </div>
            <label for="message-text" class="col-form-label">Repita senha:</label>
                <input type="password" class="form-control" name="func-new-repita-senha" required>
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