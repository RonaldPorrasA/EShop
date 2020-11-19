<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <h1 class="titulo">Iniciar Sesión</h1>
    <div class="container">
      <div class="row">
            <form class="col s12 m6" id="login-form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" name="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="pass" type="password" class="validate" name="pass" required>
                        <label for="pass">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn btn-large btn-register waves-effect waves-light" type="submit"
                            name="action">Login
                        </button>
                    </div>
                </div>
                <div class="error">
                    <ol>
                    <?php if(!empty($errores)):?>
                        <?php echo $errores;?>
                    <?php endif;?>
                    </ol>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a class="linkGris" href="registro.php">Register Now!</a></p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small"><a class="linkGris" href="#">Forgot password?</a></p>
                    </div>
                </div>
        </form>
        <img src="img/tienda.png" class="responsive-img" alt="">
      </div>
    </div>
</body>

</html>