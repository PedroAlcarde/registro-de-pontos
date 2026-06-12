<?php 

require_once 'dompdf/autoload.inc.php';
require_once __DIR__.'/app/entity/db/config.php';

use Dompdf\Dompdf;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_usuario'])){
    $id = intval($_POST['id_usuario']);

    $sql_func = $conn->query("SELECT * FROM usuario WHERE id = ".$id);
    $funcionario = $sql_func->fetch_assoc();

    $sql_regs = $conn->query("SELECT * FROM registro WHERE id_usuario = ".$id);


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
                border:1px solid #000;
                padding:5px;
            }
            
            .logo-navbar{
                width: 150px;
            }

            .top-pdf{
                display: flex;
                flex-flow: row nowrap;
                justify-content: space-between;
            </style>
            ";
    $html .= "<div class='top-pdf'><h1>Relatório do Funcionário</h1><img src='images/intime-sem-leg.png' alt='' class='logo-navbar'></div>";
    $html .= "<h3>Nome: {$funcionario['nome']}</h3>";
    $html .= "<h3>Registros:</h3>";
    $html .= "<table>";
    $html .= "<tr><th>Data</th><th>Tipo</th></tr>";

    while ($reg = $sql_regs->fetch_assoc()){
        $html .= "<tr>";
        $html .= "<td>{$reg['data_ponto']}</td>";
        $html .= "<td>{$reg['tipo_ponto']}</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";

    $conn->close();

    $dompdf = new Dompdf();
    

$dompdf->loadHtml($html);

$dompdf->render();

header('Content-type: application/pdf');

echo $dompdf->output();
}



?>