<?php

use App\Entity\ponto;
require_once __DIR__.'/app/entity/ponto.php';

use App\Entity\db\Database;
require_once __DIR__.'/app/Entity/db/Database.php';

use App\Entity\Funcionario;
require_once __DIR__.'/app/entity/Funcionario.php';

require_once __DIR__.'/app/entity/db/config.php';

$funcionarios = Funcionario::getFuncionarios();
$pontos = Ponto::getPontos($where = 'DATE (data_ponto) = CURDATE()', $order = 'id DESC', $limit = null);

include 'C:/xampp/htdocs/registro-de-pontos/includes/header.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/button-ponto.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/infodash.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/list-ponto.php';
include 'C:/xampp/htdocs/registro-de-pontos/includes/footer.php';