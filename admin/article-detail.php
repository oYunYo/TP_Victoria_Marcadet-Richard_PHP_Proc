<?php
    require_once '../pdo.php';
    require_once '../functions/article-function.php';
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


        <div id="detail" class="card mb-3 container p-t-100 p-b-100">
            <?php
                $res = $pdo->prepare('SELECT * FROM annonce WHERE id=:id');
                $res->execute(['id' => $_GET['id']]);
                $fetchRes = $res->fetch();
            ?>
            <img style="max-width: 300px;" class="card-img-top img-fluid" src="<?php echo('../images/upload/'.$fetchRes['image_link']); ?>" 
                alt="Image de l'article <?php echo($fetchRes['titre']) ?>">
            <div class="card-body">
                <h2 class="card-title"><?php echo($fetchRes['titre']) ?></h2>
                <p class="card-text">ID : <?php echo($fetchRes['id']); ?></p>
                <p class="card-text">Contenu : <?php echo($fetchRes['contenu']) ?></p>
                <p class="card-text">Auteur : <?php echo($fetchRes['nom_prenom_utilisateur']) ?></p>
                <?php $res->closeCursor(); ?>
            </div>
        </div>

    </body>
</html>

