<?php

define('TITLE', 'Registrar ponto manualmente');

use App\Entity\ponto;
require_once __DIR__.'/app/entity/ponto.php';

    $obPonto = new Ponto;



if(isset($_POST['id_usuario'], $_POST['data_ponto'], $_POST['tipo_ponto'], $_POST['latitude'], $_POST['longitude'])){


    $obPonto->id_usuario = $_POST['id_usuario'];
    $obPonto->data_ponto = $_POST['data_ponto'];
    $obPonto->tipo_ponto = $_POST['tipo_ponto'];
    $obPonto->latitude = $_POST['latitude'];
    $obPonto->longitude = $_POST['longitude'];
    $obPonto->registrar();

    header('location: index.php?status=success');
    exit;

}

include 'C:/xampp/htdocs/registro-de-pontos/includes/header.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/form-manual.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/footer.php';