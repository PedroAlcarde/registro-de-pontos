<?php 

namespace App\Entity;

use App\db\Database;
use \PDO;
require_once __DIR__.'/db/Database.php';

class Ponto{

public $id_usuario;
public $data_ponto;
public $tipo_ponto;
public $latitude;
public $longitude;

public function registrar(){
//inserir no banco de dados
$obDatabase = new Database('registro');
$this->id_usuario = $obDatabase->insert([
            'id_usuario' => $this->id_usuario,
            'data_ponto' => $this->data_ponto,
            'tipo_ponto' => $this->tipo_ponto,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
                     ]);
                     
return true;
}


// public static function getPontos($where = null, $order = null, $limit = null){
// return (new Database('registro'))->select($where,$order,$limit)
//                                 ->fetchAll(PDO::FETCH_CLASS,self::class);
// }

// public static function getPontos($id_usuario){
//     return (new Database('registro'))->select('id_usuario = '.$id_usuario)
//                                     ->fetchObject(self::class); 
// }

}