<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!--Font - icons -->
    <script src="https://kit.fontawesome.com/363bffc621.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="dist/css/bootstrap.css">

    <style type="text/css" href="index.css">
        <?php include('dist/css/styles.css');   ?>
    </style>


    <title>Nordic System</title>
</head>

<body>

    <img src="dist/img/logoNordicFinance.png" class="logoLogin">

    <div class="container">

        <form method="POST" action="php/criarConta.php"> <!-- Validação dos dados de login -->

            <label class="tituloContainer">Criar uma nova conta</label>

            <div class="form-group">
                <input type="text" class="form-control" id="nomeuser" name="nNomeUser" placeholder="Nome Completo">

            </div>

            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" name="nEmail" aria-describedby="emailHelp" placeholder="E-mail">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" name="nSenha" placeholder="Senha">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" name="nConfirmaSenha" placeholder="Confirme a Senha">
            </div>

            <button type="submit" class="btn btn-primary"><a class="abutton"> Criar conta </a></button>

            <button class="btn btn-secundary"><a href="index.php">Voltar</a></button>



    </div>
</body>

</html>