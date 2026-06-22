<?php 



namespace App\Entity;

use App\db\Database;
use \PDO;
require_once __DIR__.'/db/Database.php';
class Funcionario{

public $id;
public $nome;
public $email;
public $matricula;
public $tipo_usuario;
public $status;

public function cadastrar(){
//inserir no banco de dados
$obDatabase = new Database('usuario');
$this->id = $obDatabase->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'matricula' => $this->matricula,
            'tipo_usuario' => $this->tipo_usuario,
            'status' => $this->status,
                     ]);
                     
return true;
}

public function atualizar(){


    return (new Database('usuario'))->update('id = '.$this->id,[
            'nome' => $this->nome,
            'email' => $this->email,
            'matricula' => $this->matricula,
            'tipo_usuario' => $this->tipo_usuario,
            'status' => $this->status,
    ]);
}

public function excluir(){
    return (new Database('usuario'))->delete('id = '.$this->id);
}

public static function getFuncionarios($where = null, $order = 'id DESC', $limit = null){
return (new Database('usuario'))->select($where,$order,$limit)
                                ->fetchAll(PDO::FETCH_CLASS,self::class);
}

public static function getFuncionario($id){
    return (new Database('usuario'))->select('id = '.$id)
                                    ->fetchObject(self::class); 
}

public static function enviarEmail(){
    
}
}