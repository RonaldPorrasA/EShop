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

    <title>Registro</title>
</head>

<body>
    <h1 class="titulo">Registro</h1>
    <div class="container">
        <div class="row">
            <form class="col s12" id="reg-form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate" name="name" required>
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="lastname" required>
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="email" type="email" class="validate" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="phone" type="text" class="validate" name="phone" required>
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="address" type="text" class="validate" name="address" required>
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="pass" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password2" type="password" class="validate" name="pass2" required>
                        <label for="password2">Confirm Password</label>
                    </div>
                </div>
                <div class="input-field col s12">
                    <button class="btn btn-large btn-register waves-effect waves-light right" type="submit"
                        name="action">Register
                        <i class="material-icons right">done</i>
                    </button>
                </div>
                
        </div>
        </form>
    </div>
    <a title="Login" class="ngl btn-floating btn-large waves-effect waves-light" style="background: #E7BB41" href="index.php"><i
            class="material-icons">input</i></a>
    </div>
</body>

</html>