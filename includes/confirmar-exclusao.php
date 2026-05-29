<main>

    <section>

    </section>

    <h2>Excluir vaga</h2>

    <form method="post">

        <div class="form-group">
            <p>Você deseja realmente excluir o funcionário <strong><?= $obFuncionario->nome ?></strong>?</p>
        </div>

        
        <div class="form-group">
            <a href="index.php">
                <button type="button">Cancelar</button>
            </a>
            <button type="submit" name="excluir">Excluir</button>
        </div>

    </form>



</main>