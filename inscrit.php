<?php require('config/database.php'); ?>
<?php

$err = 1;
$errs = sha1(1);
$succ = 10;
$succs = sha1(10);

if (isset($_POST['mail']) and !empty($_POST['mail'])) {
    if (isset($_POST['username']) and !empty($_POST['username'])) {
        if (isset($_POST['password']) and !empty($_POST['password'])) {

            $mail = htmlspecialchars($_POST['mail']);
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $check_query = " SELECT * FROM login 
            WHERE username = :username OR mail = :mail
           ";
            $statement = $db->prepare($check_query);
            $check_data = array(
                ':username'   =>  $username,
                ':mail'       =>  $mail
            );
            if ($statement->execute($check_data)) {
                if ($statement->rowCount() > 0) {
                    header('location:inscription?err=' . $err . '&errs=' . $errs);
                } else {
                    if ($statement->rowCount() == 0) {
                        $req = $db->prepare('INSERT INTO login(mail,username,password) VALUES (:mail,:username,:password)');

                        $res = $req->execute(array(
                            'mail' => $mail,
                            'username' => $username,
                            'password' => $password

                        ));


                        if ($res) {

                            header('location:inscription?succ=' . $succ . '&succs=' . $succs);
                        } else {
                            header('location:inscription?err=' . $err . '&errs=' . $errs);
                        }
                    }
                }
            }
        }
    }
}


// }else{
//  header('location:inscription.php?err='.$err.'&errs='.$errs);
// }
// }else{
//  header('location:inscription.php?err='.$err.'&errs='.$errs);
// }
// }else{
//  header('location:inscription.php?err='.$err.'&errs='.$errs);
// }



?>