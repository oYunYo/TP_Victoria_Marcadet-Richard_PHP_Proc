<?php

function isUserConnected(){
    if($_SESSION['utilisateur']){
        return $_SESSION['utilisateur'];
    } else {
        header('Location: login.php');
    }
}
function login($pdo, $login, $password) {
    $errors = [];
    try{
        $req = $pdo->prepare(
            'SELECT * FROM utilisateur where login = :login AND password = :password');
        $req->execute([
            'login' => $login,
            'password' => md5($password)
        ]);
    } catch (PDOException $exception){
        var_dump($exception);
        die();
    }
    $res = $req->fetch();
    if($res == false){
        $errors[] = 'Utilisateur inconnu';
        session_destroy();
    } else {
        $_SESSION['utilisateur'] = $res;
    }
    return $errors;
}

function registerUser($pdo, $errors){
        $req = $pdo->prepare(
            'INSERT INTO utilisateur(login, password, nom, prenom)
    VALUES(:login, :password, :nom, :prenom)');
        $result = $req->execute([
            'login' => $_POST['login'],
            'password' => md5($_POST['password']),
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom']
        ]);

    return $errors;
}

function validateFormUser(){
    $error = [];
    if(empty($_POST['login'])){
        $error[] = 'Veuillez saisir le pseudo';
    }

    if(empty($_POST['password'])){
        $error[] = 'Veuillez saisir le mot de passe';
    }

    if(empty($_POST['nom'])){
        $error[] = 'Veuillez saisir le nom';
    }

    if(empty($_POST['prenom'])){
        $error[] = 'Veuillez saisir le prénom';
    }

    return $error;
}
?>