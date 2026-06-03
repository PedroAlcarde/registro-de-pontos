<?php 



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


    $result_ponto = '';
    foreach($pontos as $ponto){
        $result_ponto .= '<tr>
                            <td>'.$ponto->id_usuario.'</td>
                            <td>'.date('d/m/Y H:i:s', strtotime($ponto->data_ponto)).'</td>
                            <td>'.$ponto->tipo_ponto.'</td>
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

        <table class="table table-hover my-5 rounded-3">

            <thead>
                <tr>
                    <th>ID do funcionário</th>
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