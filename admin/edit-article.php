<?php

require_once '../functions/article-function.php';
require_once '../functions/user-function.php';
require_once '../pdo.php';

session_start();
$useradmin = isUserConnected();

$idArticle = $_GET['id'];
$article = getArticle($pdo, $idArticle);
$errors = [];
$imageUrl = null;
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validateEditForm();
    $errors = $returnValidation['errors'];
    $imageUrl = $returnValidation['image'];

    if (count($errors) === 0) {
        updateBdd($pdo, $imageUrl, $article['id']);
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
                    <h1 class="title">Editer un article</h1>
                    <form method="post" action="edit-article.php?id=<?php echo($article['id']);?>" enctype="multipart/form-data">
                        <div class="input-group">
                                <input class="input--style-3 form-control" type="text" name="titre" value="<?php echo($article['titre'])?>" placeholder="Titre">
                        </div>
                        <div class="input-group">
                                <textarea name="contenu" class="input--style-3 form-control" placeholder="Contenu"><?php echo($article['contenu'])?>"</textarea>
                        </div>
                        <div class="input-group">
                            <label>Image</label>
                            <input type="file" class="fichier" value="<?php echo($article['image_link'])?>" name="image">
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