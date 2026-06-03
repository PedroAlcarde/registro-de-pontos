

<main>

    <section>
        <a href="dashboard.php">
            <button class="btn btn-danger btn-lg my-2">Voltar</button>
        </a>
    </section>

    <h2 class="mb-2"><?= TITLE ?></h2>

    <form method="post">

        <!-- <div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        </div> -->

        <!-- <div class="form-group">
            <label>ID do funcionário</label>
            <input type="number" class="form-control" name="id_usuario" id="id_usuario" value="<?= $obPonto->id_usuario ?>">
        </div> -->

        

        <div class="form-group">
            <label>Data do registro</label>
            <input type="datetime-local" class="form-control" name="data_ponto" id="data_ponto" value="<?= $obPonto->data_ponto ?>">
        </div>

        <div class="form-group">
            <label>Tipo de Registro</label>
            <div class="form-check form-check-inline">
                <label class="form-control mx-2 my-3">
                    <input type="radio" name="tipo_ponto" value="entrada">Entrada
                </label>
            </div>

            <div class="form-check form-check-inline">
                <label class="form-control mx-2">
                    <input type="radio" name="tipo_ponto" value="saida">Saída
            </label>
            </div>

        </div>


            
            <div class="form-group">
                <label>Latitude</label>
                <input type="number" name="latitude" id="latitude" step="any" value="<?= $obPonto->latitude ?>">
            </div>



            
            <div class="form-group">
                <label>Longitude</label>
                <input type="number" name="longitude" id="longitude" step="any" value="<?= $obPonto->longitude ?>">
            </div>


        <div class="form-group">
            <label>Funcionário</label>
            <select name="id" id="id">
                <option value="" disabled selected>Selecione um funcionário</option>
                <?php 
                    
require_once __DIR__.'/../app/entity/Funcionario.php';

$funcionarios = Funcionario::getFuncionarios();

                    foreach($funcionarios as $funcionario){
                        $funcionario->id;
                        $funcionario->nome;
                        echo"<option value='".$funcionario->id."'>".$funcionario->nome."</option>";
                    }
                ?>
            </select>
        </div>
     
        
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
        </div>


    </form>



</main>

<script>
        function obterCoordenadas() {
            if (navigator.geolocation) {
                // Pede permissão e captura a posição
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                }, function(error) {
                    console.error("Erro ao obter localização: " + error.message);
                });
            } else {
                alert("Geolocalização não é suportada por este navegador.");
            }
        }

        // Executa a função assim que a página carrega
        window.onload = obterCoordenadas;
    </script>