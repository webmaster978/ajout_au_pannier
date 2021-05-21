<?php require('config/data.php'); ?>
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);



    $requete = $db->prepare('SELECT * FROM admin where  username=:username and password=:password');
    $requete->execute(array(
        'username' => $username,
        'password' => $password
    ));

    $res = $requete->fetchAll(PDO::FETCH_OBJ);

    if ($res) {
        $user->con($res[0]->id);
        header('location: acceuil');
    } else {
        header('location: index.php');
    }
}


?>