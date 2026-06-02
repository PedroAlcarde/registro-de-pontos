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
            <label>ID do funcionário</label>
            <input type="number" class="form-control" name="id_usuario" id="id_usuario" value="<?= $obPonto->id_usuario ?>">
        </div>

        <div class="form-group">
            <label>Data do registro</label>
            <input type="date" class="form-control" name="data_ponto" id="data_ponto" value="<?= $obPonto->data_ponto ?>">
        </div>

        <div class="form-group">
            <label>Tipo de Registro</label>
            <div class="form-check form-check-inline">
                <label class="form-control mx-2 my-3">
                    <input type="radio" name="tipo_ponto" id="tipo_ponto" value="entrada">Entrada
                </label>
            </div>

            <div class="form-check form-check-inline">
                <label class="form-control mx-2">
                    <input type="radio" name="tipo_ponto" id="tipo_ponto" value="saida">Saída
            </label>
            </div>

        </div>

        <div class="form-group">
            <label>Latitude</label>
            <input type="number" class="form-control" name="latitude" id="id_usuario" step="any" value="<?= $obPonto->latitude ?>">
        </div>

        <div class="form-group">
            <label>Longitude</label>
            <input type="" class="form-control" name="longitude" id="id_usuario" step="any" value="<?= $obPonto->longitude ?>">
        </div>        
        
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
        </div>

    </form>



</main>