<?php 

    date_default_timezone_set('America/Sao_Paulo');

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success mt-2">Ação executada com sucesso!</div>';
                break;
            case 'error':
                $mensagem = '<div class="alert alert-danger mt-2">Ação não executada!</div>';
                break;
        }
    }

    $lista_nomes = [];
    foreach ($funcionarios as $usuario) {
    $lista_nomes[$usuario->id] = $usuario->nome;
}

    $result_ponto = '';
    foreach($pontos as $ponto){

 $nome_usuario = $lista_nomes[$ponto->id_usuario] ?? 'Usuário ' . $ponto->id_usuario;

        $result_ponto .= '<tr>
                            <td>'.$nome_usuario.'</td>
                            <td>'.date('d/m/Y H:i:s', strtotime($ponto->data_ponto)).'</td>
                            <td>'.($ponto->tipo_ponto == 'entrada' ? 'Entrada' : 'Saída').'</td>
                            <td>'.$ponto->latitude.'</td>
                            <td>'.$ponto->longitude.'</td>
                            </tr>';
    }

    $result_ponto = strlen($result_ponto) ? $result_ponto : '<tr>
                                                        <td colspan="6" class="text-center">Nenhum registro encontrado</td>';
?>

<main class="mt-">

    <?= $mensagem ?>

    <section class="rounded-3">

        <table style="box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);" class="table table-hover my-5 rounded-3">

            <thead>
                <tr>
                    <th>Funcionário</th>
                    <th>Data do registro</th>
                    <th>Tipo do registro</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                </tr>
            </thead>
            <tbody>
               <?=$result_ponto?>
            </tbody>

        </table>

    </section>

</main>