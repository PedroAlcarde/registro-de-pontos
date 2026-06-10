<?php 
session_start();
print_r($_SESSION);
exit;


    session_destroy();
    header('Location: login.php');
    exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Sessão Funcionário</title>
    <style>
        body{
            background-color: #339fadff;

        }

        .funcionario{
            display: flex;
            flex-flow: column nowrap;
            color: white;
            justify-content: center;
            align-items: center;
            align-self: center;
            height: 40vh;
        }

        .button-ponto{
            background-color: #ffffffff;
            width: 250px;
            height: 70px;
            font-size: 25px;
            border-radius: 20px;
            margin-top: 50px;
        }

        .button-ponto:hover{
            background-color: #adadadff;
        }
    </style>
</head>
<body>
    <div class="container funcionario">
        <?php 
        
            

            echo "<h1>Bem vindo, ". $_SESSION["nome"]."!</h1>";
        
        ?>
        <form method="post">
            <input type="submit" class="button-ponto btn" name="bater_ponto" value="Registrar ponto">
        </form>
    </div>
</body>
</html>