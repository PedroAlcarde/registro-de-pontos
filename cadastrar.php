<?php

define('TITLE', 'Cadastrar funcionário');
define('CONFIRM','Cadastrar');

use App\Entity\Funcionario;
require_once __DIR__.'/app/entity/Funcionario.php';

    $obFuncionario = new Funcionario;

if(isset($_POST['nome'], $_POST['matricula'], $_POST['tipo_usuario'], $_POST['status'])){


    $obFuncionario->nome = $_POST['nome'];
    $obFuncionario->matricula = $_POST['matricula'];
    $obFuncionario->tipo_usuario = $_POST['tipo_usuario'];
    $obFuncionario->status = $_POST['status'];
    $obFuncionario->cadastrar();

    header('location: crud.php?status=success');
    exit;

}

include 'C:/xampp/htdocs/registro-de-pontos/includes/header.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/formulario.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/footer.php';