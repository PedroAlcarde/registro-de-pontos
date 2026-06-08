<?php 
// If 'app' is inside the same 'includes' folder as this file:
// require_once __DIR__.'\..\app\entity\Funcionario.php';
?>

<main>

    <section>
        <a href="dashboard.php">
            <button class="btn btn-danger btn-lg my-2">Voltar</button>
        </a>
    </section>

    <h2 class="mb-2"><?= TITLE ?></h2>

    <form  method="post">

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
                <input type="number" name="latitude" class="form-control" id="latitude" step="any" value="<?= $obPonto->latitude ?>">
            </div>



            
            <div class="form-group">
                <label>Longitude</label>
                <input type="number" name="longitude" class="form-control" id="longitude" step="any" value="<?= $obPonto->longitude ?>">
            </div>


        <div class="form-group">
            <label>Funcionário</label>
            <select name="id_usuario" id="id_usuario" class="form-control">
                <option value="" disabled selected>Selecione um funcionário</option>
                <?php 

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

