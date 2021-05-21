<?php require('config/database.php'); ?>
<?php
if (empty($_SESSION['user'])) {
    header('location:../login');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php
            if ($_SESSION['user']['username'] !== array()) {
                $users = $_SESSION['user']['username'];

                echo "Pannier :: $users";
            }
            ?></title>
    <link rel="icon" type="images" href="../assets/images/t.png">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <script src="js/bootstrap.min.js"></script>
    <style>
    .popover {
        width: 100%;
        max-width: 800px;
    }

    .ii {
        height: 120px;
        width: 200px;
    }
    </style>
</head>

<body>
    <div class="container">
        <br />

        <br />
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Boulangerie</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Acceuil</a></li>


                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a id="cart-popover" class="btn" data-placement="bottom" title="Mon pannier">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                <span class="badge"></span>
                                <span class="total_price">$ 0.00</span>
                            </a>
                        </li>
                        <li class="dropdown">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                                                                                            if ($_SESSION['user']['username'] !== array()) {
                                                                                                $users = $_SESSION['user']['username'];

                                                                                                echo " $users";
                                                                                            }
                                                                                            ?></span>
                                <img style="width:30px" class=" img img-rounded" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <ul class="dropdown-menu">
                                <li><a href="../logout.php">Deconnexion</a></li>

                            </ul>
                        </li>


                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>

        <div id="popover_content_wrapper" style="display: none">
            <span id="cart_details"></span>
            <div align="right">
                <a href="#" class="btn btn-primary" id="check_out_cart">
                    <span class="glyphicon glyphicon-shopping-cart"></span> pannier
                </a>
                <a href="#" class="btn btn-default" id="clear_cart">
                    <span class="glyphicon glyphicon-trash"></span> Supprimer
                </a>
            </div>
        </div>
        <br>
        <br>

        <div id="display_item">


        </div>

    </div>
</body>

</html>

<script>
$(document).ready(function() {

    load_product();

    load_cart_data();

    function load_product() {
        $.ajax({
            url: "fetch_item.php",
            method: "POST",
            success: function(data) {
                $('#display_item').html(data);
            }
        });
    }

    function load_cart_data() {
        $.ajax({
            url: "fetch_cart.php",
            method: "POST",
            dataType: "json",
            success: function(data) {
                $('#cart_details').html(data.cart_details);
                $('.total_price').text(data.total_price);
                $('.badge').text(data.total_item);
            }
        });
    }

    $('#cart-popover').popover({
        html: true,
        container: 'body',
        content: function() {
            return $('#popover_content_wrapper').html();
        }
    });

    $(document).on('click', '.add_to_cart', function() {
        var product_id = $(this).attr("id");
        var product_name = $('#name' + product_id + '').val();
        var product_price = $('#price' + product_id + '').val();
        var product_quantity = $('#quantity' + product_id).val();
        var action = "add";
        if (product_quantity > 0) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_price: product_price,
                    product_quantity: product_quantity,
                    action: action
                },
                success: function(data) {
                    load_cart_data();
                    alert("produit ajouter avec successes");
                }
            });
        } else {
            alert("veuillez entrer la quantite");
        }
    });

    $(document).on('click', '.delete', function() {
        var product_id = $(this).attr("id");
        var action = 'remove';
        if (confirm("Etes vous sur de vouloir supprimer le produit?")) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    action: action
                },
                success: function() {
                    load_cart_data();
                    $('#cart-popover').popover('hide');
                    alert("element supprimer du pannier");
                }
            })
        } else {
            return false;
        }
    });

    $(document).on('click', '#clear_cart', function() {
        var action = 'empty';
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: action
            },
            success: function() {
                load_cart_data();
                $('#cart-popover').popover('hide');
                alert("Volez vous vider le pannier?");
            }
        });
    });

});
</script>