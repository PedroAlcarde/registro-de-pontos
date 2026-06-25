
<?php 
date_default_timezone_set('America/Sao_Paulo');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

session_start();
require_once __DIR__.'/app/entity/db/config.php';
    $result_dia = '';
    $ponto_email = '';
    $saida_time = '';
    $entrada_time = '';

    $id_registro = $_SESSION["id"];

    $sqlHistorico = "SELECT data_ponto, tipo_ponto FROM registro WHERE id_usuario = '{$id_registro}' ORDER BY id DESC LIMIT 20";

    $res = $conn->query($sqlHistorico);

    $registros = [];

    $result_hist = '';

    while($row = $res->fetch_object())
        $registros[] = $row;

    foreach($registros as $registro_funcionario){
        $result_hist .= '<tr style="text-align: center;">
                            <td>'.date('d/m/Y H:i:s', strtotime($registro_funcionario->data_ponto)).'</td>
                            <td>'.($registro_funcionario->tipo_ponto == 'entrada' ? 'Entrada' : 'Saída').'</td>
                         </tr>';
    }

    $result_hist = strlen($result_hist) ? $result_hist : '<tr>
                                                        <td colspan="6" class="text-center">Nenhum registro encontrado</td>';


    
        $select_day = "SELECT * FROM registro WHERE id_usuario = '{$id_registro}' AND DATE (data_ponto) = CURDATE() ORDER BY id DESC LIMIT 2";
        $mostrar_tempo = false;
        $res_day = $conn->query($select_day) or die($conn->error);
        $result = $res_day->fetch_all();
if(count($result)>0){
 if($result[0][3]=='saida'){

        $ponto_email = 'entrada';
        foreach($result as $result_day){
            if($result_day[3] == 'entrada'){
                $entrada_time = new DateTime($result_day[2]);
            }elseif ($result_day[3] == 'saida') {
                $saida_time = new DateTime($result_day[2]);
            }
        }

        if(!$entrada_time == null && !$saida_time == null){

        $intervalo = $entrada_time->diff($saida_time);

        $result_dia = "<div>
                        <h1>Tempo trabalhado: ".$intervalo->h. "h ".$intervalo->i."m ".$intervalo->s."s.</h1>
                    </div>";    
        }
      
    }else{
        $result_dia= "<div>
                        <h1>Em jornada de trabalho...</h1>
                    </div>";
        $ponto_email = 'saída';
        
    }
}else{
    $result_dia= "<div>
                        <h1>Iniciar jornada de trabalho</h1>
                    </div>";
}
   

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bater_ponto'])){

        $latitude = $_SESSION["latitudephp"];
        $longitude = $_SESSION["longitudephp"];

        function calcularHaversine($lat1, $lon1, $lat2, $lon2) {
            $raioTerra = 6371; 
    
            $dLat = deg2rad($lat2 - $lat1);
            $dLon = deg2rad($lon2 - $lon1);
            
            //curvatura
            $a = sin($dLat / 2) * sin($dLat / 2) +
                cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
                sin($dLon / 2) * sin($dLon / 2);
            
            //angulo
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
            //km
            return $raioTerra * $c; 
        }
        //-22.060663 teste
        $latUsuario = $latitude; 
        //-46.976082 teste
        $lngUsuario = $longitude;
        $latLoja = -21.964561;
        $lngLoja = -46.791603;

    
        $distancia = calcularHaversine($latUsuario, $lngUsuario, $latLoja, $lngLoja);

    
        if ($distancia <= 0.2) {
                $phpmailer = new PHPMailer(true);

                $email_usuario = $_SESSION["email"];
                $id_usuario = $_SESSION["id"];
                $data_ponto = date('Y-m-d H:i:s');
                $data_hoje = date('Y-m-d');
            

                $select = "SELECT * FROM registro WHERE id_usuario = '{$id_usuario}' ORDER BY id DESC LIMIT 1";

                $res = $conn->query($select) or die($conn->error);

                $row = $res->fetch_object();

                $qtd = $res->num_rows;
            
                if($qtd>0){
                    if($row->tipo_ponto === 'entrada'){
                        $sql = "INSERT INTO registro (id_usuario, data_ponto, tipo_ponto, latitude, longitude) VALUES('".$id_usuario."','".$data_ponto."', 'saida', '".$latitude."', '".$longitude."')";
                        $conn->query($sql);
                    }elseif($row->tipo_ponto === 'saida'){
                        $sql = "INSERT INTO registro (id_usuario, data_ponto, tipo_ponto, latitude, longitude) VALUES('".$id_usuario."','".$data_ponto."', 'entrada', '".$latitude."', '".$longitude."')";
                        $conn->query($sql);
                    }
                }else{
                    $sql = "INSERT INTO registro (id_usuario, data_ponto, tipo_ponto, latitude, longitude) VALUES('".$id_usuario."','".$data_ponto."', 'entrada', '".$latitude."', '".$longitude."')";
                    $conn->query($sql);
                }

                

            //    try {

        //     $phpmailer = new PHPMailer(true);

        //     $phpmailer->CharSet = 'UTF-8'; 
        //     $phpmailer->isSMTP();
        //     $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        //     $phpmailer->SMTPAuth = true;
        //     $phpmailer->Port = 2525;
        //     $phpmailer->Username = '40acd6649702f1';
        //     $phpmailer->Password = '188d017f2b22d5';
        //     $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //     $phpmailer->setFrom('sistema@empresa.com', 'Sistema de Ponto');
        //     $phpmailer->addAddress($email_usuario);

        //     $html_conteudo = file_get_contents('email.html');

        //     $nome_funcionario = $_SESSION['nome'];
        //     $html_conteudo = str_replace('{{nome}}', $nome_funcionario, $html_conteudo);
        //     $html_conteudo = str_replace('{{tipoPonto}}', $ponto_email, $html_conteudo);
        //     $html_conteudo = str_replace('{{dataPonto}}', $data_ponto, $html_conteudo);
            
        //     $phpmailer->addEmbeddedImage('images/intime-sem-leg.png', 'logo_img');

        //     $phpmailer->isHTML(true);
        //     $phpmailer->Subject = 'Registro de ponto';
        //     $phpmailer->Body = $html_conteudo;
        //     $phpmailer->AltBody = "Olá, seu ponto foi registrado em {$data_ponto}";

        //     $phpmailer->send();

        // } catch (Exception $e) {
        //     error_log($phpmailer->ErrorInfo);
        // }

                header('Location: ponto-funcionario.php');

                echo "<script>alert('E-mail de confirmação!');</script>";

        } else {
            echo "<script>alert('Registro não efetuado. Você não está no raio mínimo da empresa.')</script>;";
        }

        

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Sessão Funcionário</title>
    <style>
        body{
            background-color: #339fadff;

        }

        th{
            text-align: center;
        }

        .funcionario{
            display: flex;
            flex-flow: column nowrap;
            color: white;
            justify-content: center;
            align-items: center;
            align-self: center;

        }

        .funcionario > h1{
            font-size: 65px;
            text-align: center;
        }

        .button-ponto{
            background-color: #ecececff;
            width: 250px;
            height: 70px;
            font-size: 25px;
            border-radius: 20px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .button-ponto:hover{
            background-color: #adadadff;
        }

        .sair-funcionario{
            margin: 10px;
            display: flex;
            flex-flow: row nowrap;
            justify-content: end;
        }
    </style>
</head>
<body>
    <div>
        <span class="text-light navbar-text sair-funcionario">
            <a href="logout.php" class="btn btn-danger text-white ">Sair</a>
          </span>
    </div>
    <div class="container funcionario">
        <?php 

            echo "<h1>Bem vindo, ". $_SESSION["nome"]."!</h1>";

        
        ?>
        <form method="post">
            <input type="submit" style="background-color: orange; color:black;" class="button-ponto btn" name="bater_ponto" value="Registrar ponto" <?php if(isset($row) && $row !== null && $row->tipo_ponto === 'saida')?> >
        </form>

        <?= $result_dia ?>

        <div>
            <h5 style="text-align: center; margin-top: 20px; margin-bottom: 20px; color: white; padding: 10px; border-radius: 50%; width: 250px; height: 250px; align-items: center; justify-content: center; display: flex; font-size: 23px; border: white 2px solid;" class="js-data">Quarta, 17 de junho de 2026 <br>14:06:00</h5>
        </div>

        <table class="table table-hover my-5 rounded-3">
            <h2>Histórico de registros</h2>
            <thead>
                <tr>
                    <th>Data e hora</th>
                    <th>Tipo de registro</th>
                </tr>
            </thead>
            <tbody>
               <?= $result_hist?>
            </tbody>

        </table>
    </div>

    <script>

            if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                console.log("Latitude:", position.coords.latitude);
                console.log("Longitude:", position.coords.longitude);
                console.log("Precisão (metros):", position.coords.accuracy);
                sessionStorage.setItem('latitude', position.coords.latitude);
                sessionStorage.setItem('longitude', position.coords.longitude);
                fetch('salvar-localizacao.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'lat=' + position.coords.latitude + '&lon=' + position.coords.longitude
                })
                .then(response => response.text())
                .then(data => console.log(data));
                },
                (error) => {
                console.error("Erro ao obter localização:", error.message);
                }
            );
            } else {
            console.log("Geolocalização não suportada neste navegador.");
            }

            function setarData(){
            let elementoData = document.querySelector(".js-data");

            let data = new Date();

            const objData = {
                year: 'numeric',
                month: 'long',
                weekday: 'long',
                day: 'numeric',
        };

        elementoData.textContent = data.toLocaleTimeString("pt-BR", objData);
        }

        setarData();
        setInterval(() => {
            setarData();    
        }, 1000);
    </script>
</body>
</html>