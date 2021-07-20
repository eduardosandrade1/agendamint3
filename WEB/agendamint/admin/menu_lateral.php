<div id="home">
    <div class="h4 link-sidebar">
        <a href="principal.php?link=1">Home</a>
    </div>
</div>
<div id="sessao">
    <?php if($_SESSION['nivel_acesso'] == USER_FUNCIONARIO){ ?>
        <h4>Cadastrar</h4>
        <ul>
            <li><a class="h5" href="principal.php?link=2">Usuário</a></li>
        </ul>
        <h4>Visualizar</h4>
        <ul>
            <li><a class="h5" href="principal.php?link=4">Sua agenda</a></li>
        </ul>
    <?php } ?>
    <?php if($_SESSION['nivel_acesso'] == USER_MASTER){ ?>
        <br>
        <h4>Cadastrar/editar</h4>
        <ul>
            <li><a class="h5" href="principal.php?link=5">Serviços</a></li>
            <li><a class="h5" href="principal.php?link=3">Funcionários</a></li>
        </ul>
    <?php } ?>
    <div class="footer-menu-lateral">
        <a class="h5" href="principal.php?link=6"><span class="bi bi-gear"></span> Dados da Empresa</a>
    </div>
    
</div>

