<?php 




date_default_timezone_set('America/Sao_Paulo');

require_once 'dompdf/autoload.inc.php';
require_once __DIR__.'/app/entity/db/config.php';

use Dompdf\Dompdf;

$path = realpath(__DIR__ . '/images/intime-sem-leg.png');

$imageData = base64_encode(file_get_contents($path));




if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_usuario'])){
    $id = intval($_POST['id_usuario']);
    $option = $_POST['acao'];

    $sql_func = $conn->query("SELECT * FROM usuario WHERE id = ".$id);
    $funcionario = $sql_func->fetch_assoc();

    $sql_regs = $conn->query("SELECT * FROM registro WHERE id_usuario = ".$id);

if($option === 'pdf'){
        $html = "
                <style>
                body{
                    font-family: Arial, Helvetica, sans-serif;
                }

                table{
                    
                    width:100%;
                    border-collapse:collapse;
                }
                th, td{
                    border:none;
                }

                .borda-pdf{
                    border:1px solid #000;
                    padding:5px;
                }
                
                .logo-navbar{
                    width: 150px;
                }

                .top-pdf > th{
                    border:none;
                }

                .meio{
                    border:1px solid black;
                    width: 25%;
                    height: 100px;
                    background-color: blue;
                }
                </style>
                ";
        $html .= "
    <table class='top-pdf' width='100%' style='border:none; border-collapse:collapse;'>
        <tr>
            <td style='text-align:left; font-size:18px; font-weight:bold;'>
                Relatório do Funcionário
            </td>

            <td style='text-align:right;'>
                <img src='data:image/png;base64,$imageData' width='150'>
            </td>
        </tr>
    </table>
    ";
        
        $html .= "<h3>Nome: {$funcionario['nome']}</h3>";
        $html .= "<h3>Registros:</h3>";
        $html .= "<table>";
        $html .= "<tr><th class='borda-pdf'>Data</th><th class='borda-pdf'>Tipo</th></tr>";

        while ($reg = $sql_regs->fetch_assoc()){
            $html .= "<tr>";
            $html .= "<td class='borda-pdf'>{$reg['data_ponto']}</td>";
            $html .= "<td class='borda-pdf'>{$reg['tipo_ponto']}</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";

        $conn->close();

        $dompdf = new Dompdf();
        

    $dompdf->loadHtml($html);

    $dompdf->render();

    header('Content-type: application/pdf');

    echo $dompdf->output();
    }elseif($option === 'relatorio'){

        
        include 'C:/xampp/htdocs/registro-de-pontos/includes/header.php';

        ?><a href="relatorio.php">
            <button class="btn btn-danger btn-lg my-2">Voltar</button>
        </a>
<?php 

         $html = "
                <style>
                body{
                    font-family: Arial, Helvetica, sans-serif;
                }

                table{
                    
                    width:100%;
                    border-collapse:collapse;
                }
                th, td{
                    border:none;
                }

                .borda-pdf{
                    border:1px solid #000;
                    padding:5px;
                }
                
                .logo-navbar{
                    width: 150px;
                }

                .top-pdf > th{
                    border:none;
                }

                .meio{
                    border:1px solid black;
                    width: 25%;
                    height: 100px;
                    background-color: blue;
                }
                </style>
                ";
        $html .= "
    <table class='top-pdf' width='100%' style='border:none; border-collapse:collapse;'>
        <tr>
            <td style='text-align:left; font-size:18px; font-weight:bold;'>
                Relatório do Funcionário
            </td>

            <td style='text-align:right;'>
                <img src='data:image/png;base64,$imageData' width='150'>
            </td>
        </tr>
    </table>
    ";
        
        $html .= "<h3>Nome: {$funcionario['nome']}</h3>";
        $html .= "<h3>Registros:</h3>";
        $html .= "<table>";
        $html .= "<tr><th class='borda-pdf'>Data</th><th class='borda-pdf'>Tipo</th></tr>";

        while ($reg = $sql_regs->fetch_assoc()){
            $html .= "<tr>";
            $html .= "<td class='borda-pdf'>{$reg['data_ponto']}</td>";
            $html .= "<td class='borda-pdf'>{$reg['tipo_ponto']}</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";

        $conn->close();
        echo $html;

        
        include 'C:/xampp/htdocs/registro-de-pontos/includes/footer.php';
        
    }
}



?>