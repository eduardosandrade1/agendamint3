<div class="modal fade" id="novo-serv" tabindex="-1" role="dialog" aria-labelledby="novo-serv-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="h4">Novo Serviço</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="op_novo_servico.php" method="post">

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Descrição:</label>
                <input type="text" class="form-control" name="servico-new-descricao" required>
            </div>      

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Preço:</label>
                <input type="number" step=".01" class="form-control" name="servico-new-preco" required>
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