<?php 

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
                break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
                break;
        }
    }

    $resultados = '';
    foreach($funcionarios as $funcionario){
        $resultados .= '<tr>
                            <td>'.$funcionario->id.'</td>
                            <td>'.$funcionario->nome.'</td>
                            <td>'.$funcionario->matricula.'</td>
                            <td>'.$funcionario->tipo_usuario.'</td>
                            <td>'.($funcionario->status == 's' ? 'Ativo' : 'Inativo').'</td>
                            <td>
                                <a href="editar.php?id='.$funcionario->id.'"><button type="button" class="btn btn-primary">Editar</button></a>
                                <a href="excluir.php?id='.$funcionario->id.'"><button type="button" class="btn btn-danger">Excluir</button></a>
                            </td>
                            </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="6" class="text-center">Nenhuma vaga encontrada</td>';
?>

<main class="mt-">

    <?= $mensagem ?>

    <section>
        <a href="cadastrar.php">
            <button class="btn text-dark bg-info btn-lg">Cadastrar funcionário</button>
        </a>
    </section>

    <section class="rounded-3">

        <table class="table table-hover my-5 rounded-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Tipo de Usuário</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
               <?=$resultados?>
            </tbody>

        </table>

    </section>

</main>