<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include('../librerias.php');

$oUsuario = new Usuario($_REQUEST['username'], $_REQUEST['password']);

if($oUsuario->VerificaAcceso()){
    $_SESSION["USER"] = $oUsuario;
    echo "ok";
} else {
    echo "error";
}
die();