<?php

use App\Entity\ponto;
require_once __DIR__.'/app/entity/ponto.php';


$pontos = Ponto::getPontos();

include 'C:/xampp/htdocs/registro-de-pontos/includes/header.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/button-ponto.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/list-ponto.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/footer.php';