<?php 
include 'C:/xampp/htdocs/registro-de-pontos/includes/header.php';


use App\Entity\ponto;
use App\Entity\Funcionario;

require_once __DIR__.'/app/entity/ponto.php';
require_once __DIR__. '/app/entity/Funcionario.php';

    $obPonto = new Ponto;
    //  $obFuncionario = new Funcionario;



$funcionarios = Funcionario::getFuncionarios();
if(isset($_POST['id_usuario'], $_POST['data_ponto'], $_POST['tipo_ponto'], $_POST['latitude'], $_POST['longitude'])){


    $obPonto->id_usuario = $_POST['id_usuario'];
    $obPonto->data_ponto = $_POST['data_ponto'];
    $obPonto->tipo_ponto = $_POST['tipo_ponto'];
    $obPonto->latitude = $_POST['latitude'];
    $obPonto->longitude = $_POST['longitude'];
}
?>
    <h2>Gerar relatório individual</h2>
    <form action="gerar_pdf.php" method="POST">

    <div class="form-group">
            <label for="id_usuario"><strong>Selecione um funcionário</strong></label>
            <select name="id_usuario" id="id_usuario" class="form-control" required>
                <option value="" disabled selected>Funcionário</option>
                <?php 

                    foreach($funcionarios as $funcionario){
                        $funcionario->id;
                        $funcionario->nome;
                        echo"<option value='".$funcionario->id."'>".$funcionario->nome."</option>";
                    }
                ?>
            </select>
            <label for="data_inicio" class=" mt-4"><strong>Início do período desejado</strong></label>
            <input type="date" name="data_inicio" class="form-control mb-4" required>
            <label for="data_fim"><strong>Final do período desejado</strong></label>
            <input type="date" name="data_fim" class="form-control" required>
        </div>

    <button type="submit" name="acao" value="relatorio" class="btn btn-primary mt-3">
        Gerar relatório
    </button>

    <button type="submit" name="acao" formtarget="_blank" value="pdf" class="btn btn-primary mt-3">
        Gerar PDF
    </button>
</form>


<?php 
include 'C:/xampp/htdocs/registro-de-pontos/includes/footer.php';
?>


        



