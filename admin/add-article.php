<?php

require_once '../functions/article-function.php';
require_once '../functions/user-function.php';
require_once '../pdo.php';

session_start();
$useradmin = isUserConnected();



$errors = [];
$imageUrl = null;
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validateForm();
    $errors = $returnValidation['errors'];

    if(count($errors) === 0) {
        addBdd($pdo, $returnValidation['image']);
        header('Location: admin-homepage.php');
    }
}



?>

<html>
<head>
<?php
    include 'admin-stylesheets.php'
?>
</head>
<body>

<?php
include 'admin-nav.php';
?>

<div class="page-wrapper bg-gra-01 p-t-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card-3 border-0">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h1 class="title">Ajouter un article</h1>
                    <form method="post" action="add-article.php" enctype="multipart/form-data">
                        <div class="input-group">
                                <input class="input--style-3 form-control" type="text" name="titre" placeholder="Titre">
                        </div>
                        <div class="input-group">
                                <textarea name="contenu" class="input--style-3 form-control" placeholder="Contenu"></textarea>
                        </div>
                        <div class="input-group">
                            <label>Image</label>
                            <input type="file" class="fichier" name="image">
                        </div>
                        <div class="p-t-10">
                        <button class="btn btn--pill btn-warning" type="submit">Valider</button>
                        </div>
                        <div class="mt-3">
                        <?php
                            if(is_array($errors) && count($errors) != 0){
                                echo ('<h4>Le formulaire ne peut pas être validé pour les raisons suivantes :</h4>');
                                foreach ($errors as $error){
                                    echo('<div class="error">'.$error.'</div>');
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