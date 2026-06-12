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
        $resultados .= '<tr style="text-align: center;">
                            <td>'.$funcionario->id.'</td>
                            <td>'.$funcionario->nome.'</td>
                            <td>'.$funcionario->matricula.'</td>
                            <td>'.($funcionario->tipo_usuario == 'admin' ? 'Administrador' : 'Funcionário').'</td>
                            <td>'.($funcionario->status == 's' ? '<p style="background-color: #88E788; color: #3b663bff; border-radius: 20px;"><strong>Ativo</strong><p>' : '<p style="background-color: #ff7e7eff; color: #8f0202ff; border-radius: 20px;"><strong>Inativo</strong></p>').'</td>
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
                <tr style="text-align: center;">
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