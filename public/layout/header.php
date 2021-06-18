<html>
<head>
    <meta charset="utf-8">
    <title>Sistema de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<?php
    if(!empty($_SESSION)){
?>
<nav class='navbar navbar-expand-lg navbar-light bg-light'>
    <div class='container-fluid'>
        <a class='navbar-brand' href='#'>TienditaMia</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'
                aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                    <a class='nav-link' href='bienvenido.php'>Inicio</a>
                </li>
                <?php
                $tipo = $_SESSION["tipo"];
                switch ($tipo) {
                    case "vendedor":
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='ventasCrear.php'>Registrar Ventas</a>
                </li>";
                        break;
                    case "dispensador":
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='ventasDespacho.php'>Despachar Ventas</a>
                </li>";
                        break;
                }
                ?>
                <li class='nav-item'>
                    <a class='nav-link btn btn-sm btn-outline-secondary' href='logout.php'>logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
    }
?>
<div class="container mt-3">
