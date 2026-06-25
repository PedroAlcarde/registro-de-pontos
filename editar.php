<?php



use App\Entity\Funcionario;

require_once __DIR__.'/app/entity/Funcionario.php';


define('TITLE','Editar funcionário');
define('CONFIRM','Editar');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: crud.php?status=error');
    exit;
}

$obFuncionario = Funcionario::getFuncionario($_GET['id']);

if(!$obFuncionario instanceof Funcionario){
    header('location: crud.php?status=error');
    exit;
}

if(isset($_POST['nome'], $_POST['email'], $_POST['matricula'], $_POST['tipo_usuario'], $_POST['status'])){

    $obFuncionario = new Funcionario;
    $obFuncionario->id = $_REQUEST['id'];
    $obFuncionario->nome = $_POST['nome'];
    $obFuncionario->email = $_POST['email'];
    $obFuncionario->matricula = $_POST['matricula'];
    $obFuncionario->tipo_usuario = $_POST['tipo_usuario'];
    $obFuncionario->status = $_POST['status'];
    $obFuncionario->atualizar();

    header('location: crud.php?status=success');
    exit;

}

include 'D:/xampp/htdocs/registro-de-pontos/includes/header.php';
include 'D:/xampp/htdocs/registro-de-pontos/includes/formulario.php';
include 'D:/xampp/htdocs/registro-de-pontos/includes/footer.php';