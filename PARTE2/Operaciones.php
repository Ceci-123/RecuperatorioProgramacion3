<?php

class Operaciones
{

    public static function ConseguirIDMaximo($lista, $numeroPartida)
    {
        $idMaxima = $numeroPartida;
        if (count($lista) > 0) {
            foreach ($lista as $item) {
                if ($item->id > $idMaxima) {
                    $idMaxima = $item->id;
                }
            }
        }
        return $idMaxima;
    }
    public static function BuscarHelado($listaDeHelados, $sabor, $tipo)
    {
        if (count($listaDeHelados) > 0) {
            foreach ($listaDeHelados as $helado) {
                if ($helado->sabor == $sabor && $helado->tipo == $tipo) {
                    return $helado;
                }
            }
        }
        return null;
    }
    public static function CompararNombres($ventaUno, $ventaDos)
    {
        return strcmp($ventaUno->mailUsuario, $ventaDos->mailUsuario);
    }
}
