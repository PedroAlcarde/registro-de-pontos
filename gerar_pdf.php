<?php 

require_once 'dompdf/autoload.inc.php';
require_once __DIR__.'/app/entity/db/config.php';

use Dompdf\Dompdf;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_usuario'])){
    $id = intval($_POST['id_usuario']);

    $sql_func = $conn->query("SELECT * FROM usuario WHERE id = ".$id);
    $funcionario = $sql_func->fetch_assoc();

    $sql_regs = $conn->query("SELECT * FROM registro WHERE id_usuario = ".$id);

    $html = "<h1>Relatório do Funcionário</h1>";
    $html .= "<p>Nome: {$funcionario['nome']}</p>";
    $html .= "<h3>Registros:</h3>";
    $html .= "<table>";
    $html .= "<tr><th>Data</th><th>Descrição</th><th>Valor</th></tr>";

    while ($reg = $sql_regs->fetch_assoc()){
        $html .= "<tr>";
        $html .= "<td>{$reg['data']}</td>";
        $html .= "<td>{$reg['descricao']}</td>";
        $html .= "<td>{$reg['valor']}</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";

    $conn->close();

    $dompdf = new Dompdf();

$dompdf->loadHtml("Olá mundo!");

$dompdf->render();

header('Content-type: application/pdf');

echo $dompdf->output();
}



?>