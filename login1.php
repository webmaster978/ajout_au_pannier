<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/undraw_rocket.svg" type="image/x-icon">

    <title>login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">


            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <?php
                            if (isset($_GET['err']) and !empty($_GET['err'])) {

                                if (isset($_GET['errs']) and !empty($_GET['errs'])) {
                                    if (sha1($_GET['err']) == $_GET['errs']) {







                            ?>





                            <script type="text/javascript">
                            alert("username ou mot de passe incorect");
                            </script>







                            <?php
                                    }
                                }
                            }



                            ?>
                            <div class="col-lg-6 d-none d-lg-block ">
                                <a href="boulangerie"><i class="fa fa-arrow-alt-circle-left" style="font-size: 28px;">
                                    </i></a>
                                <div class="pt-5">

                                    <img src="img/undraw_rocket.svg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">My shop</h1>
                                    </div>
                                    <span id="error"></span>
                                    <form Class="user" action="verif.php" method="POST" autocomplete="off">
                                        <div class="form-group">
                                            <input style="text-align:center" type="text" name="username" id="user_email"
                                                class="form-control form-control-user" required
                                                data-parsley-type="email" placeholder="Nom d'utilisateur" />


                                        </div>
                                        <div class="form-group">
                                            <input style="text-align:center" type="password" name="password"
                                                id="user_password" class="form-control form-control-user" required
                                                placeholder="Mot de passe" />


                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se souvenir de
                                                    moi</label>
                                            </div>
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit"
                                            value="Se connecter">




                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        N'avez-vous pas de compte?<a class="" href="inscription">Creer ici</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>




</body>

</html>