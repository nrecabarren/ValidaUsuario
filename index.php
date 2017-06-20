<?php
include "constantes.php";
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="webroot/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <?php if(!isset($_SESSION["USER"])){ ?>
        <form action="<?=URL;?>controlador/valida.php" method='POST' id="formValidaUsuario">
            <div class="mensaje"></div>
            <div>
                <label>Nombre de Usuario:</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label>Contraseña:</label>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" value="Verificar">
        </form>
        <?php } ?>
        
        <?php if(isset($_SESSION["USER"])){ ?>
            <a href="<?=URL;?>controlador/cerrarSesion.php">Cerrar Sesión</a>
        <?php } ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#formValidaUsuario').on('submit',function(e){
                    e.preventDefault();
                    
                    if( $('#username').val() == "" || $('#password').val() == "" ){
                        alert("Debe introducir un nombre de usuario y contraseña.");
                    } else {
                        
                        $.ajax({
                            url: "<?=URL;?>controlador/valida.php",
                            data: $('#formValidaUsuario').serialize(),
                            type: "POST",
                            success: function(response){
                                if( $.trim(response) == 'ok' ){
                                    $('#username').val("");
                                    $('#password').val("");
                                    $('.mensaje').html("Usuario existe.");
                                } else {
                                    $('.mensaje').html("Usuario no existe en la BD.");
                                }
                            }
                        });
                        
                        return true;
                    }
                });
            });
        </script>
    </body>
</html>
