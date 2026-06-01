<main>

    <section>
        <a href="index.php">
            <button class="btn btn-danger btn-lg my-2">Voltar</button>
        </a>
    </section>

    <h2><?= TITLE ?></h2>

    <form method="post">

        <!-- <div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        </div> -->

        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?= $obFuncionario->nome ?>">
        </div>

        <div class="form-group">
            <label>Matrícula</label>
            <input type="number" class="form-control" name="matricula" id="matricula" value="<?= $obFuncionario->matricula ?>">
        </div>

        <div class="form-group">
            <label>Tipo de Usuário</label>
            <div class="form-check form-check-inline">
                <label class="form-control mx-2 my-3">
                    <input type="radio" name="tipo_usuario" id="tipo_usuario" value="admin" <?= $obFuncionario->tipo_usuario == 'admin' ? 'checked' : '' ?>>Administrador
                </label>
            </div>

            <div class="form-check form-check-inline">
                <label class="form-control mx-2">
                    <input type="radio" name="tipo_usuario" id="tipo_usuario" value="funcionario" <?= $obFuncionario->tipo_usuario == 'funcionario' ? 'checked' : '' ?>>Funcionário
            </label>
            </div>

        </div>

        <div class="form-group">
            <label>Status</label>
            <div class="form-check form-check-inline">
                <label class="form-control mx-5 my-3">
                    <input type="radio" name="status" id="status" value="s" <?= $obFuncionario->status == 's' ? 'checked' : '' ?>>Ativo
                </label>
            </div>
            
            <div class="form-check form-check-inline">
                <label class="form-control mx-5">
                    <input type="radio" name="status" id="status" value="n" <?= $obFuncionario->status == 'n' ? 'checked' : '' ?>>Inativo
                </label>
            </div>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg"><?= CONFIRM ?></button>
        </div>

    </form>



</main>