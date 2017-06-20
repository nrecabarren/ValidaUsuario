<?php
 
 /* 
  * To change this license header, choose License Headers in Project Properties.
  * To change this template file, choose Tools | Templates
  * and open the template in the editor.
  */
class Usuario{
    var $id;
    var $nombre;
    var $username;
    var $password;

    public function __construct($username="",$password="") {
       $this->username=$username;
       $this->password=$password;
    }

    public function VerificaAcceso(){
        $oConn=new Conexion();

        if($oConn->Conectar()){
            $db=$oConn->objconn;            
        }else{
            return false;
        }

        //$clavemd5=md5($this->password);
        $clavemd5 = $this->password;
        $sql="SELECT * FROM acceso"
            ." WHERE username='$this->username' and password='$clavemd5'";

        $resultado=$db->query($sql);

        if($resultado->num_rows>=1){
            $this->idusuario=0;
            $this->nombre="";
            return true;
        } else{
            return false;
        }
    }
 }