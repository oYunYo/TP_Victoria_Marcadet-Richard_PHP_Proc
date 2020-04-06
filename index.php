<?php
    require_once 'functions/article-function.php';
    require_once 'pdo.php';
?>

<html>
<head>
<?php
    include 'stylesheets.php';
?>
</head>
<body>
<?php
    include 'nav.php';
?>


<section class="container p-t-100">
    <h1 class="text-center mb-4">Les articles disponibles</h1>
      <div class="row services justify-content-around">
      <?php
            $reponse = $pdo->query('SELECT * FROM annonce');
            while ($data = $reponse->fetch()) {
      ?>
        <div class="col-md-4 col-10 rounded d-flex flex-column justify-content-between service bg-fond p-0">
            <img class="img-fluid" src="<?php echo('images/upload/'.$data['image_link']); ?>"
                 alt="Image de l\'article <?php echo($data['titre']); ?>"/>
            <div class="p-4 mb-3">
              <h3 class="text-center mt-3">Titre : <?php echo($data['titre']); ?></h3>
              <hr class="mx-5">
              <p class="text-justify">ID : <?php echo($data['id']); ?></p>
              <p class="text-justify">Contenu : <?php echo($data['contenu']); ?></p>
              <p class="text-justify">Auteur : <?php echo($data['nom_prenom_utilisateur']); ?></p>
            </div>
        </div>
        <?php
                } $reponse->closeCursor();
        ?>
      </div>
</section>


</body>
</html>



































