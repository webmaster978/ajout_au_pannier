<!Doctype html>
<html lang="en">

<head>
    <title>Nos produits</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="../images/savoir.jpg" type="image/jpg" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- CSS Files -->

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="demo/demo.css" rel="stylesheet" />


    <link rel="stylesheet" href="./assets/vendor/animate-css/vivify.min.css">

    <link rel="stylesheet" href="./assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="./assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../html/assets/css/site.min.css">


</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white">

            <div class="logo">
                <img width="200px;" src="../images/savoir.JPG" class="img-responsive img-circle">
            </div>
            <?php include '../partials/_menu.php' ?>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">


                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">


                    <div class="table-responsive">
                        <h1 class="h2">Nos produits</h1>
                        <div align="right">
                            <button type="button" id="add_button" data-toggle="modal" data-target="#userModal"
                                class="btn btn-info btn-lg">Nouveau <i class="fa fa-plus"></i> </button>
                        </div>
                        <br>
                        <table id="user_data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="10%">Image</th>
                                    <th width="35%">Titre</th>
                                    <th width="35%">Detail</th>
                                    <th width="10%">Modifier</th>
                                    <th width="10%">Supprimer</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>

                <div id="userModal" class="modal fade">
                    <div class="modal-dialog">
                        <form method="post" id="user_form" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Ajouter des produits</h4>
                                </div>
                                <div class="modal-body">
                                    <label>Titre de l'image</label>
                                    <input type="text" name="name" id="name" class="form-control" />
                                    <br />
                                    <label>Detail</label>
                                    <input type="number" name="price" id="price" class="form-control" />
                                    <br />
                                    <label>Choisir une image</label>
                                    <input type="file" name="image" id="image" />
                                    <span id="user_uploaded_image"></span>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id" id="id" />
                                    <input type="hidden" name="operation" id="operation" />
                                    <input type="submit" name="action" id="action" class="btn btn-success"
                                        value="Ajouter" />
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



                <!-- Javascript -->
                <script src="./html/assets/bundles/libscripts.bundle.js"></script>
                <script src="./html/assets/bundles/vendorscripts.bundle.js"></script>

                <script src="./html/assets/bundles/datatablescripts.bundle.js"></script>
                <script src="./assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
                <script src="./assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
                <script src="./assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
                <script src="./assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
                <script src="./assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
                <script src="./assets/vendor/sweetalert/sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->
                <script src="./html/assets/bundles/mainscripts.bundle.js"></script>
                <script src="./html/assets/js/pages/tables/jquery-datatable.js"></script>

                <script type="text/javascript" language="javascript">
                $(document).ready(function() {
                    $('#add_button').click(function() {
                        $('#user_form')[0].reset();
                        $('.modal-title').text("Ajouter produit");
                        $('#action').val("Add");
                        $('#operation').val("Add");
                        $('#user_uploaded_image').html('');
                    });

                    var dataTable = $('#user_data').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                            url: "fetch.php",
                            type: "POST"
                        },
                        "columnDefs": [{
                            "targets": [0, 3, 4],
                            "orderable": false,
                        }, ],

                    });

                    $(document).on('submit', '#user_form', function(event) {
                        event.preventDefault();
                        var firstName = $('#name').val();
                        var lastName = $('#price').val();
                        var extension = $('#image').val().split('.').pop().toLowerCase();
                        if (extension != '') {
                            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                                alert("Format invalide");
                                $('#image').val('');
                                return false;
                            }
                        }
                        if (firstName != '' && lastName != '') {
                            $.ajax({
                                url: "insert.php",
                                method: 'POST',
                                data: new FormData(this),
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    alert(data);
                                    $('#user_form')[0].reset();
                                    $('#userModal').modal('hide');
                                    dataTable.ajax.reload();
                                }
                            });
                        } else {
                            alert("Tout les champ sont demander !!!");
                        }
                    });

                    $(document).on('click', '.update', function() {
                        var user_id = $(this).attr("id");
                        $.ajax({
                            url: "fetch_single.php",
                            method: "POST",
                            data: {
                                id: id
                            },
                            dataType: "json",
                            success: function(data) {
                                $('#userModal').modal('show');
                                $('#name').val(data.name);
                                $('#price').val(data.price);
                                $('.modal-title').text("Modifier le produit");
                                $('#user_id').val(user_id);
                                $('#user_uploaded_image').html(data.image);
                                $('#action').val("Edit");
                                $('#operation').val("Edit");
                            }
                        })
                    });

                    $(document).on('click', '.delete', function() {
                        var user_id = $(this).attr("id");
                        if (confirm("Etes vous sur de vouloir supprimer cela ?")) {
                            $.ajax({
                                url: "delete.php",
                                method: "POST",
                                data: {
                                    user_id: user_id
                                },
                                success: function(data) {
                                    alert(data);
                                    dataTable.ajax.reload();
                                }
                            });
                        } else {
                            return false;
                        }
                    });


                });
                </script>





                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="float-left">
                            <ul>
                                <li>
                                    <a href="#">
                                        Creative Tim
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright float-right">
                            &copy;
                            <script>
                            document.write(new Date().getFullYear())
                            </script>, made with <i class="material-icons">favorite</i> by
                            <a>Creative Tim</a>
                        </div>
                        <!-- your footer here -->
                    </div>
                </footer>
            </div>
        </div>
</body>

</html>