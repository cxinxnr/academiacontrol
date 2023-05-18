<?php

// QUEBRAMOS A ROTA EM UM ARRAY
$rota = explode('/', substr($_SERVER['REQUEST_URI'],1));
// $rota[0] é o recurso / $rota[1] é a açãO
// Como não temos index, se o recurso for / entao carregamos para a pagina padrão home 
$recurso = empty($rota[0]) ? 'home' : $rota[0];
// Criarmos o controlador dinamicamente par ao $recurso
$controlador = "controllers/$recurso.controller.php";
// entao, salvamos a acão. Caso nao haja açao, o padrao é listar index
$ação = empty($rota[1] ? 'index' : $rota[1]);

if (file_exists($controlador)){
    require($controlador);
}else{
    require("controllers/404.controller.php");
}