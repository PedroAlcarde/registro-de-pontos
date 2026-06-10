<?php

session_start();

if(empty($_POST) or (empty($_POST["matricula"]) or (empty($_POST["senha"])))){
    print "<script>location.href='index.php';</script>";
}

require_once __DIR__.'/app/entity/db/config.php';

$matricula = $_POST["matricula"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuario WHERE matricula = '{$matricula}' AND senha = '{$senha}'";

$res = $conn->query($sql) or die($conn->error);

$row = $res->fetch_object();

$qtd = $res->num_rows;

if($qtd > 0){
    $_SESSION["nome"] = $row->nome;
    $_SESSION["tipo_usuario"] = $row->tipo_usuario;
    $_SESSION["id"] = $row->id;
    // print "<script>location.href='dashboard.php';</script>";
    if($_SESSION["tipo_usuario"] === 'admin'){
        print "<script>location.href='dashboard.php';</script>";
    }else{
        print "<script>location.href='ponto-funcionario.php';</script>";
    }
}else{
    print "<script>alert('Matrícula e/ou senha incorreta(s)')</script>";
    print "<script>location.href='index.php';</script>";
}
?>