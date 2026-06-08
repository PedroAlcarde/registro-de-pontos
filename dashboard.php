<?php

use App\Entity\ponto;
require_once __DIR__.'/app/entity/ponto.php';

use App\Entity\db\Database;
require_once __DIR__.'/app/Entity/db/Database.php';

use App\Entity\Funcionario;
require_once __DIR__.'/app/entity/Funcionario.php';

$funcionarios = Funcionario::getFuncionarios();
$pontos = Ponto::getPontos();

include 'C:/xampp/htdocs/registro-de-pontos/includes/header.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/button-ponto.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/list-ponto.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/footer.php';