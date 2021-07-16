<div id="home">
    <div class="h4 link-sidebar">
        <a href="principal.php?link=1">Home</a>
    </div>
</div>
<div id="sessao">
    <div class="h4">Detalhes</div>
    <?php if($_SESSION['nivel_acesso'] == USER_FUNCIONARIO){ ?>
        <ul>
            <li><a class="h5" href="principal.php?link=2">Usuário</a></li>
        </ul>
    <?php } ?>
    <?php if($_SESSION['nivel_acesso'] == USER_MASTER){ ?>
        <ul>
            <li><a class="h5" href="principal.php?link=3">Funcionários</a></li>
        </ul>
    <?php } ?>
</div>

