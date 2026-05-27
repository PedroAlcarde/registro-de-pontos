<main>

    <section>
        <a href="index.php">
            <button>Voltar</button>
        </a>
    </section>

    <h2>Cadastrar vaga</h2>

    <form method="post">

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" id="nome">
        </div>

        <div class="form-group">
            <label>Matrícula</label>
            <input type="number" name="matricula" id="matricula">
        </div>

        <div class="form-group">
            <label>Tipo de Usuário</label>
            <input type="radio" name="tipo_usuario" id="tipo_usuario" value="admin">Administrador
            <input type="radio" name="tipo_usuario" id="tipo_usuario" value="funcionario">Funcionário
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="radio" name="status" id="status" value="s">Ativo
            <input type="radio" name="status" id="status" value="n">Inativo
        </div>
        
        <div class="form-group">
            <button type="submit">Cadastrar</button>
        </div>

    </form>



</main>