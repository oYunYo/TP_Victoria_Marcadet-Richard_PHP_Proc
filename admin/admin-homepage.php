<?php
session_start();
    require_once '../functions/user-function.php';
    require_once '../functions/article-function.php';
    require_once '../pdo.php';
    $useradmin = isUserConnected();
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


<section class="container p-t-100">
    <h1 class="text-center mb-4">Bonjour <?php echo $useradmin['prenom'];?></h1>
    <h2 class="text-white text-center mb-4">Les articles disponibles dans notre base de donnée :</h2>
      <div class="row services justify-content-around">
      <?php
            $reponse = $pdo->query('SELECT * FROM annonce');
            while ($data = $reponse->fetch()) {
      ?>
        <div class="col-md-4 col-10 rounded d-flex flex-column justify-content-between service bg-fond p-0">
            <img class="img-fluid" src="<?php echo('../images/upload/'.$data['image_link']); ?>"
                 alt="Image de l\'article <?php echo($data['titre']); ?>"/>
            <div class="p-4 mb-3">
              <h3 class="text-center mt-3">Titre : <?php echo($data['titre']); ?></h3>
              <hr class="mx-5">
              <p class="text-justify">ID : <?php echo($data['id']); ?></p>
              <p class="text-justify">Contenu : <?php echo($data['contenu']); ?></p>
              <p class="text-justify">Auteur : <?php echo($data['nom_prenom_utilisateur']); ?></p>
              <div id="details">
                <a href="article-detail.php?id=<?php echo($data['id']); ?>"><button type="button"
                    class="btn btn-warning btn-lg btn-block">Voir le détail
                </button></a>
              </div>
              <div id="edit" class="mt-2">
                <a href="edit-article.php?id=<?php echo($data['id']); ?>"><button type="button"
                    class="btn btn-warning btn-lg btn-block">Editer l'article
                </button></a>
              </div>
              <div id="delete" class="mt-2">
                <a href="delete-article.php?id=<?php echo($data['id']);?>"><button type="button"
                class="btn btn-warning btn-lg btn-block">Supprimer l'article
                </button></a>
              </div>
            </div>
        </div>
        <?php
                } $reponse->closeCursor();
        ?>
      </div>
</section>


</body>
</html>



































