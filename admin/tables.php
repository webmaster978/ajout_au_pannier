<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="./assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="./assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Paramettre</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Deconnexion</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>




                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                            Produit
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid">
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
                                            <th width="35%">Nom du produit</th>
                                            <th width="35%">prix</th>
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
                                            <h4 class="modal-title">Ajouter un produit</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>Nom du produit</label>
                                            <input type="text" name="name" id="name" class="form-control" />
                                            <br />
                                            <label>Prix</label>
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
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Fermer</button>
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
                        <script src="./assets/vendor/sweetalert/sweetalert.min.js"></script>
                        <!-- SweetAlert Plugin Js -->
                        <script src="js/scripts.js"></script>

                        <script src="assets/demo/datatables-demo.js"></script>
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
                                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -
                                        1) {
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




                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Allrigth reserved by Copyright &copy; Boulangerie 2020 - <script>
                            document.write(new Date().getFullYear())
                            </script>
                        </div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


</body>

</html>