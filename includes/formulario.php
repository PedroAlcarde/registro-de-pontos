<main>

    <section>
        <a href="index.php">
            <button>Voltar</button>
        </a>
    </section>

    <h2><?= TITLE ?></h2>

    <form method="post">

        <!-- <div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        </div> -->

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" id="nome" value="<?= $obFuncionario->nome ?>">
        </div>

        <div class="form-group">
            <label>Matrícula</label>
            <input type="number" name="matricula" id="matricula" value="<?= $obFuncionario->matricula ?>">
        </div>

        <div class="form-group">
            <label>Tipo de Usuário</label>
            <input type="radio" name="tipo_usuario" id="tipo_usuario" value="admin" <?= $obFuncionario->tipo_usuario == 'admin' ? 'checked' : '' ?>>Administrador
            <input type="radio" name="tipo_usuario" id="tipo_usuario" value="funcionario" <?= $obFuncionario->tipo_usuario == 'funcionario' ? 'checked' : '' ?>>Funcionário
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="radio" name="status" id="status" value="s" <?= $obFuncionario->status == 's' ? 'checked' : '' ?>>Ativo
            <input type="radio" name="status" id="status" value="n" <?= $obFuncionario->status == 'n' ? 'checked' : '' ?>>Inativo
        </div>
        
        <div class="form-group">
            <button type="submit"><?= CONFIRM ?></button>
        </div>

    </form>



</main>