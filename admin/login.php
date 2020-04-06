<?php
session_start();

require_once '../pdo.php';
require_once '../functions/user-function.php';
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = login($pdo, $_POST['login'], $_POST['password']);

    if(count($errors) == 0){
       header('Location: admin-homepage.php');
    }
}
?>
<html>
<head>
<?php
include 'admin-stylesheets.php';
?>
</head>
<body>

<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card-3 border-0">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h1 class="title">Connexion</h1>
                    <form method="post">
                        <div class="input-group">
                                <input class="input--style-3 form-control" type="text" name="login" placeholder="Identifiant">
                        </div>
                        <div class="input-group">
                                <input class="input--style-3 form-control" type="password" name="password" placeholder="Mot de passe">
                        </div>
                        <div class="p-t-10">
                        <button class="btn btn--pill btn--green" type="submit">Valider</button>
                        </div>
                        <div class="mt-3">
                        <?php
                            if(isset($errors)){
                                if(count($errors)>0){
                                    echo('<h2>Les erreurs : </h2>');
                                    foreach ($errors as $error){
                                        echo('<li>'.$error.'</li>');
                                    }
                                }
                            }
                        ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>