<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Login</title>
    <style>

        .login{
            width: 100%;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        .logo-index{
            display: flex;
            justify-content: center;
            height: 25vh;
        }

        .logo-index > img{
            width: 400px;
           
        }

        .entrar{
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-light">
    <div  class="logo-index">
        <img src="images/intime.png" alt="intime">
    </div>
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="POST">
                                <div>
                                    <div class="mb-3">
                                        <label>Matrícula</label>
                                        <input type="text" name="matricula" class="form-control" required>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3">
                                        <label>Senha</label>
                                        <input type="password" name="senha" class="form-control" required>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3 entrar">
                                        <button type="submit" class="btn btn-primary">Entrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>