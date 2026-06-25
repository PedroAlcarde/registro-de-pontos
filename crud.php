<?php

use App\Entity\Funcionario;
require_once __DIR__.'/app/entity/Funcionario.php';

$funcionarios = Funcionario::getFuncionarios();



include 'D:/xampp/htdocs/registro-de-pontos/includes/header.php';
include 'D:/xampp/htdocs/registro-de-pontos/includes/listagem.php';
include 'D:/xampp/htdocs/registro-de-pontos/includes/footer.php';