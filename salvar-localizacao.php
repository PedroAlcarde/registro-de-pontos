<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    // Pega as coordenadas enviadas pelo JS
    $latitude = $_POST['lat'];
    $longitude = $_POST['lon'];

    // Sanitiza os dados (prática recomendada de segurança)
    $latitude = filter_var($latitude, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $longitude = filter_var($longitude, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Aqui você pode salvar no banco de dados ou processar como precisar
    // Exemplo: $pdo->query("INSERT INTO localizacoes (lat, lon) VALUES ('$latitude', '$longitude')");

    
    $_SESSION["latitudephp"] = $latitude;
    $_SESSION["longitudephp"] = $longitude;


    echo "Localização salva com sucesso: Latitude " . $latitude . ", Longitude " . $longitude;
}
?>