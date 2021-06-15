<?php

use config\Ayuda;

include_once "config/autoload.php";

Ayuda::autenticado();

require_once "public/layout/header.php";
?>
    <div class="row">
        <div class="col">
            <h1>Bienvenido</h1>
        </div>
    </div>
<?php
require_once "public/layout/footer.php";