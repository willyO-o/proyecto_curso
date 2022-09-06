<?php

    $vistas = [
        "inicio"=>"inicio.php",
        "registro"=>"registro.php",
        "login"=>"login.php",
        "pregunta"=>"pregunta.php",
        "consulta"=>"consulta.php",
    ];

?>

<?php include "./includes/header.php"; ?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include "./includes/navbar.php"; ?>

        <!-- /.navbar -->

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">10 Preguntas <small></small></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Consultas</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container">

                    <!-- contenido -->

                    <?php

                    if (isset($_GET["vista"])) {
                        include "./views/".($vistas[$_GET["vista"]] ?? "404.php");
                    } else {
                        include "./views/inicio.php";
                    }

                    ?>

                    <!--  contenido -->

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>


    </div>

    <?php include "./includes/footer.php"; ?>

</body>

</html>