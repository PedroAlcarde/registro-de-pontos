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

?>
    <?= $mensagem ?>
<div>
    <a href="ponto-manual.php"><button class="btn btn-primary btn-lg">Registrar ponto manualmente</button></a>
</div>