<?php
spl_autoload_register(function ($clase){
    require_once $clase.".php";
});

