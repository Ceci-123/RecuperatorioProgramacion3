<!-- a- Listar las devoluciones con cupones.
b- Listar solo los cupones y su estado.
c- Listar devoluciones y sus cupones y si fueron usados -->
<?php
include_once "Descuento.php";
include_once "ManejoJSON.php";
include_once "Operaciones.php";
include_once "DevolverHelado.php";

$listaDeCupones = array();


$listaDeJSON = ManejoJSON::LeerListaJSON("cupones.json");

if($listaDeJSON!=null &&count($listaDeJSON)>0)
{
    foreach ($listaDeJSON as $cuponesJson)
    {
        $cuponAuxiliar = new Descuento ($cuponesJson["id"],$cuponesJson["idPedido"], $cuponesJson["porcentajeDescuento"],$cuponesJson["usado"]);
        array_push($listaDeCupones,$cuponAuxiliar);
    }
}

foreach($listaDeCupones as $cupon){
    $cupon->Mostrar();
}

$listaDeJSON = ManejoJSON::LeerListaJSON("devoluciones.json");
if ($listaDeJSON != null && count($listaDeJSON) > 0) {
    foreach ($listaDeJSON as $devolucionJson) {
      
        $devolucionJson->Mostrar();
    }
}