<?php
class Funcoesbasicas_Controller {

    public function CorteTexto($Texto, $Tamanho){
        if(strlen($Texto) > $Tamanho) {
            return substr($Texto, 0, $Tamanho) . '...';
        }
        else{
            return $Texto;
        }
    }
}