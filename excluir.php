<?php



use App\Entity\Funcionario;

require_once __DIR__.'/app/entity/Funcionario.php';




if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: crud.php?status=error');
    exit;
}

$obFuncionario = Funcionario::getFuncionario($_GET['id']);

if(!$obFuncionario instanceof Funcionario){
    header('location: crud.php?status=error');
    exit;
}

if(isset($_POST['excluir'])){

    $obFuncionario->excluir();

    header('location: crud.php?status=success');
    exit;

}

include 'C:/xampp/htdocs/registro-de-pontos/includes/header.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/confirmar-exclusao.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/footer.php';