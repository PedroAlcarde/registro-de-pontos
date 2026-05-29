<?php

use App\Entity\Funcionario;
require_once __DIR__.'/app/entity/Funcionario.php';

$funcionarios = Funcionario::getFuncionarios();

include 'C:/xampp/htdocs/registro-de-pontos/includes/sidebar.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/header.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/listagem.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/footer.php';