<?php

include_once "ManejoJSON.php";
include_once "Venta.php";

$listaDeVentas = array();
$listaDeJSON = ManejoJSON::LeerListaJSON("Ventas.json");


parse_str(file_get_contents("php://input"), $post_vars);

$auxMail = $post_vars["mailUsuario"];
$auxSabor = $post_vars["sabor"];
$auxTipo = $post_vars["tipo"];
$auxCantidad = $post_vars["cantidad"];
$auxPedido = $post_vars["numeroDePedido"];


if($listaDeJSON!=null &&count($listaDeJSON)>0)
{
    foreach ($listaDeJSON as $ventaJson)
    {
        $ventaAuxiliar = new Venta ($ventaJson["id"],$ventaJson["mailUsuario"],
        $ventaJson["sabor"],$ventaJson["tipo"],$ventaJson["cantidad"],$ventaJson["numeroDePedido"],
    $ventaJson["fechaDePedido"]);
        array_push($listaDeVentas,$ventaAuxiliar);
    }
}
foreach ($listaDeVentas as $venta ) {
    if($venta->numeroDePedido == $auxPedido && $venta->mailUsuario ==$auxMail)
    {
        echo "Antes de cambiar\n";
        $venta->Mostrar();
        $venta->sabor = $auxSabor;
        $venta->tipo = $auxTipo;
        $venta->cantidad = $auxCantidad;
        echo "Se modificó la venta\n";
        $venta->Mostrar();
    }
}

ManejoJSON::GuardarListaJSON($listaDeVentas,"Ventas.json");
