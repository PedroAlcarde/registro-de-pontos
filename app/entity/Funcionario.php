<?php 

namespace App\Entity;

use App\db\Database;
require_once __DIR__.'/db/Database.php';

class Funcionario{

public $id;
public $nome;
public $matricula;
public $tipo_usuario;
public $status;

public function cadastrar(){
//inserir no banco de dados
$obDatabase = new Database('usuario');
$this->id = $obDatabase->insert([
            'nome' => $this->nome,
            'matricula' => $this->matricula,
            'tipo_usuario' => $this->tipo_usuario,
            'status' => $this->status,
                     ]);
                     
return true;
}



}