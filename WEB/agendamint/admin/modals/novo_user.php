<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="h4">Novo usuário</div>
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
                <label for="message-text" class="col-form-label">Usuario:</label>
                <input class="form-control" name="user-new-user" required>
            </div>
            <!-- email -->
            <div class="form-group">
                <label for="message-text" class="col-form-label">Email:</label>
                <input class="form-control" name="email-new-user" required>
            </div>
            <!-- senha -->
            <div class="form-group">
                <label for="message-text" class="col-form-label">Senha:</label>
                <input type="password" class="form-control" name="senha-new-user" required>
            </div>    
            <!-- repetição de senha -->
            <div class="form-group">
                <label for="message-text" class="col-form-label">Repita senha:</label>
                <input type="password" class="form-control" name="senha-repita-new-user" required>
            </div>
            
            <!-- send the form -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>