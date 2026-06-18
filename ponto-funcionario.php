<?php 
date_default_timezone_set('America/Sao_Paulo');

session_start();
require_once __DIR__.'/app/entity/db/config.php';

    $id_registro = $_SESSION["id"];

    $sqlHistorico = "SELECT data_ponto, tipo_ponto FROM registro WHERE id_usuario = '{$id_registro}' ORDER BY id DESC";

    $res = $conn->query($sqlHistorico);

    $registros = [];

    $result_hist = '';

    while($row = $res->fetch_object())
        $registros[] = $row;

    foreach($registros as $registro_funcionario){
        $result_hist .= '<tr style="text-align: center;">
                            <td>'.date('d/m/Y H:i:s', strtotime($registro_funcionario->data_ponto)).'</td>
                            <td>'.($registro_funcionario->tipo_ponto == 'entrada' ? 'Entrada' : 'Saída').'</td>
                         </tr>';
    }

    $result_hist = strlen($result_hist) ? $result_hist : '<tr>
                                                        <td colspan="6" class="text-center">Nenhum registro encontrado</td>';


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bater_ponto'])){

        $id_usuario = $_SESSION["id"];
        $data_ponto = date('Y-m-d H:i:s');
        $data_hoje = date('Y-m-d');

        $select = "SELECT * FROM registro WHERE id_usuario = '{$id_usuario}' ORDER BY id DESC LIMIT 1";

        $res = $conn->query($select) or die($conn->error);

        $row = $res->fetch_object();

        $qtd = $res->num_rows;

        $select_day = "SELECT * FROM registro WHERE id_usuario = '{$id_usuario}' AND DATE (data_ponto) = CURDATE()";

        $res_day = $conn->query($select_day) or die($conn->error);

        $row_day = $res_day->fetch_object();

        


        
        if($qtd>0){
            if($row->tipo_ponto === 'entrada'){
                $sql = "INSERT INTO registro (id_usuario, data_ponto, tipo_ponto) VALUES('".$id_usuario."','".$data_ponto."', 'saida')";
                $conn->query($sql);
            }elseif($row->tipo_ponto === 'saida'){
                $sql = "INSERT INTO registro (id_usuario, data_ponto, tipo_ponto) VALUES('".$id_usuario."','".$data_ponto."', 'entrada')";
                $conn->query($sql);
            }
        }else{
            $sql = "INSERT INTO registro (id_usuario, data_ponto, tipo_ponto) VALUES('".$id_usuario."','".$data_ponto."', 'entrada')";
            $conn->query($sql);
        }



        session_destroy();
        header('Location: login.php');
        exit;


}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Sessão Funcionário</title>
    <style>
        body{
            background-color: #339fadff;

        }

        th{
            text-align: center;
        }

        .funcionario{
            display: flex;
            flex-flow: column nowrap;
            color: white;
            justify-content: center;
            align-items: center;
            align-self: center;

        }

        .funcionario > h1{
            font-size: 65px;
            text-align: center;
        }

        .button-ponto{
            background-color: #ecececff;
            width: 250px;
            height: 70px;
            font-size: 25px;
            border-radius: 20px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .button-ponto:hover{
            background-color: #adadadff;
        }

        .sair-funcionario{
            margin: 10px;
            display: flex;
            flex-flow: row nowrap;
            justify-content: end;
        }
    </style>
</head>
<body>
    <div>
        <span class="text-light navbar-text sair-funcionario">
            <a href="logout.php" class="btn btn-danger text-white ">Sair</a>
          </span>
    </div>
    <div class="container funcionario">
        <?php 
        
            

            echo "<h1>Bem vindo, ". $_SESSION["nome"]."!</h1>";
        
        ?>
        <form method="post">
            <input type="submit" style="background-color: orange; color:black;" class="button-ponto btn" name="bater_ponto" value="Registrar ponto">
        </form>

        <div>
            <h5 style="text-align: center; margin-top: 20px; margin-bottom: 20px; color: white; padding: 10px; border-radius: 50%; width: 250px; height: 250px; align-items: center; justify-content: center; display: flex; font-size: 23px; border: white 2px solid;" class="js-data">Quarta, 17 de junho de 2026 <br>14:06:00</h5>
        </div>

        <table class="table table-hover my-5 rounded-3">
            <h2>Histórico de registros</h2>
            <thead>
                <tr>
                    <th>Data e hora</th>
                    <th>Tipo de registro</th>
                </tr>
            </thead>
            <tbody>
               <?= $result_hist?>
            </tbody>

        </table>
    </div>

    <script>
        function setarData(){
            let elementoData = document.querySelector(".js-data");

            let data = new Date();

            const objData = {
                year: 'numeric',
                month: 'long',
                weekday: 'long',
                day: 'numeric',
        };

        elementoData.textContent = data.toLocaleTimeString("pt-BR", objData);
        }

        setarData();
        setInterval(() => {
            setarData();    
        }, 1000);
    </script>
</body>
</html>