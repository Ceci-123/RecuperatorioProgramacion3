<?php

session_start();

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        switch ($_POST["accion"]) {
            case "alta":
                include_once "HeladeriaAlta.php";
                break;
            case "consultar":
                include_once "HeladoConsultar.php";
                break;
            case "venta":
                include_once "AltaVenta.php";
                break;
        }
    case "GET":
        include_once "ConsultasVentas.php";
        break;
    case "PUT":
        include_once "ModificarVenta.php";
        break;
}
