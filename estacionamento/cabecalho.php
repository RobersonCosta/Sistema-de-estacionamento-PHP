<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include_once 'usuario.php';

$usuario = new Usuario();
$listaUsuarios = $usuario->listaUsuarios();

$cache_expire = session_cache_expire(60);
session_start();



if(isset($_SESSION['usuario']) && $_SESSION['administrador'] == "t"){    
    include 'cabecalhoLogado.php';
}

else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $trimusuario = trim($_POST['usuario']);
    $trimemail = trim($_POST['senha']);
    if(!empty($trimusuario) && !empty($trimemail)){
        foreach ($listaUsuarios as $usuario) {
            if ($usuario->getLogin()==$_POST['usuario'] && $usuario->getSenha()==$_POST['senha']) {
                $_SESSION['usuario'] = $usuario->getLogin();
                $_SESSION['senha'] = $usuario->getSenha(); 
                if ($usuario->getAdministrador()=='t') {
                    $_SESSION['administrador'] = $usuario->getAdministrador();              
                }  
                break;
            } else echo "Usuario não encontrado";
        } 

        header("location: home.php");
    }
    else {
        header("location: home.php");
    }
 
}else{
    include 'cabecalhoDeslogado.php';
} ?>

