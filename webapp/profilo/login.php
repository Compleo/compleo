<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./assets/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/style.css">


</head>

<body>
    <div class="ui large top fixed stackable menu">
        <div class="ui container">
            <a class="item" href="../"><img src="./assets/logo.png"></a>
            <a class="active item" href="./">
                Home
            </a>
            <a class="item">
                        Offerte
            </a>
        </div>
    </div>
    <div class="ui middle aligned center aligned grid">

        <div class="column" id="login-form">
            <h2 class="ui blue image header">
                <div class="content ">
                    Accedi al tuo account
                </div>
            </h2>
            <form class="ui large form" method="post" action="./php/login_verifica.php">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="E-mail address">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="field" id="check-remember">
                                <div class="ui checkbox">
                                <input type="checkbox" tabindex="0" class="hidden">
                                <label>Ricordami</label>
                                </div>
                    </div>
                    </div>
                    <div class="ui fluid large teal submit primary button">Login</div>
                </div>

                <div class="ui error message"></div>

            </form>

            <div class="ui message">
                Non sei registrato? <a href="#">fallo subito</a>
            </div>
        </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="./assets/semantic/semantic.min.js"></script>
</body>

</html>