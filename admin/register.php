<?php
require_once '../pdo.php';
require_once '../functions/user-function.php';

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){


    $errors = validateFormUser();

    if(count($errors) ==  0){
        $errors = registerUser($pdo, $errors);
        if(count($errors) == 0){
            header('Location: admin-homepage.php');
        }
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

<?php
    include 'admin-nav.php';
?>

<div class="page-wrapper bg-gra-01 p-t-100 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card-3 border-0">
                <div class="card-heading users"></div>
                <div class="card-body">
                    <h1 class="title">Nouvel utilisateur</h1>
                    <form method="post" action="register.php">
                        <div class="input-group">
                                <input class="input--style-3 form-control" type="text" name="login" required placeholder="Identifiant">
                        </div>
                        <div class="input-group">
                                <input class="input--style-3 form-control" type="password" name="password" required placeholder="Mot de passe">
                        </div>
                        <div class="input-group">
                                <input class="input--style-3 form-control" type="text" name="nom" required placeholder="Nom">
                        </div>
                        <div class="input-group">
                                <input class="input--style-3 form-control" type="text" name="prenom" required placeholder="Prénom">
                        </div>
                        <div class="p-t-10">
                        <button class="btn btn--pill btn-warning" type="submit">Valider</button>
                        </div>
                        <div class="mt-3">
                        <?php
                            if(isset($errors)){
                                if(count($errors)>0){
                                    echo('<h2 class="text-white">Les erreurs : </h2>');
                                    foreach ($errors as $error){
                                        echo('<li class="text-white">'.$error.'</li>');
                                    }
                                }
                            }
                        ?>
                        </div>
                        <a href="admin-homepage.php">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>







