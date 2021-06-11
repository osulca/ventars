<?php

use config\Ayuda;

include_once "config/autoload.php";
require_once "public/layout/header.php";
Ayuda::autenticado();
$tipo = $_SESSION["tipo"];
echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
          <div class='container-fluid'>
            <a class='navbar-brand' href='#'>Navbar</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
              <ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
switch ($tipo) {
    case "vendedor":
        echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Registrar Ventas</a>
             </li>";
        break;
    case "dispensador":
        echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Despachar Ventas</a>
             </li>";
        break;
}
echo "<li class='nav-item'>
            <a class='nav-link'  href='logout.php'>logout</a>
      </li>";
echo "</ul>
        </div>
      </div>
    </nav>";

?>
    <div class="container">
        <div class="row">
            <div class="col bg-primary">
                ajustes
            </div>
            <div class="col">
                <h1>Bienvenido</h1>
            </div>
        </div>
    </div>
<?php
require_once "public/layout/footer.php";