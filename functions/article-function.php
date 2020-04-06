<?php

function getArticle($pdo,$id)
{
    $res = $pdo->prepare('SELECT * FROM annonce WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}

function deleteArticle($pdo, $id)
{
    $res = $pdo->prepare('DELETE FROM annonce WHERE id = :id');
    $res->execute(['id'=> $id]);
}

function addBdd($pdo, $imageUrl){
    $nomUser = $_SESSION['utilisateur']['nom'].' '.$_SESSION['utilisateur']['prenom'];

    $req = $pdo->prepare(
        'INSERT INTO annonce(image_link, contenu, titre , nom_prenom_utilisateur)
    VALUES(:image_link, :contenu, :titre, :nom_prenom_utilisateur)');
    $req->execute([
        'contenu' => $_POST['contenu'],
        'titre' => $_POST['titre'],
        'nom_prenom_utilisateur' => $nomUser,
        'image_link' => $imageUrl
    ]);
}

function updateBdd($pdo, $imageUrl, $id){
    if($imageUrl != ''){
        $req = $pdo->prepare('UPDATE annonce SET titre = :titre, contenu = :contenu, image_link = :image_link WHERE id = :id');
        $req->execute([
            'contenu' => $_POST['contenu'],
            'titre' => $_POST['titre'],
            'image_link' => $imageUrl,
            'id'=> $id
            ]);
    } else {
        $req = $pdo->prepare('UPDATE annonce SET titre = :titre, contenu = :contenu WHERE id = :id');
        $req->execute([
            'contenu' => $_POST['contenu'],
            'titre' => $_POST['titre'],
            'id'=> $id
        ]);
    }
}

function validateForm() {
    $errors = [];
    $imageUrl = "";
    if($_FILES['image']['size'] > 0){
        $types_acceptes = ['image/png','image/jpg', 'image/jpeg', 'image/gif'];
        if(in_array($_FILES['image']['type'], $types_acceptes)){
            if($_FILES['image']['size']<50000){
                $extension = explode('/', $_FILES['image']['type'])[1];
                $imageUrl = uniqid().'.'.$extension;
                move_uploaded_file($_FILES['image']['tmp_name'], '../images/upload/'.$imageUrl);
            } else {
                $errors[] = 'Fichier trop lourd impossible';
            }
        } else {
            $errors[] = 'Formats acceptés : png, jpg, jpeg, gif';
        }
    }

    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir le titre de l\'article';
    }
    if ( empty($_POST['contenu'])) {
        $errors[] = 'Veuillez saisir le contenu de l\'article';
    }

    return ['errors'=>$errors, 'image'=>$imageUrl];
}

function validateEditForm() {
    return validateForm();
}

?>
