<?php

trait ViewTrait{
    public function view($nome, $dados = []){
        foreach ($dados as $key => $value){
            ${$key} = $value;
        }
        return require("./src/views/$nome.php");
    }
}