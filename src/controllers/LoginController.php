<?php

namespace App\Controllers;
use App\Models\LoginModel;
require './src/traits/ViewTrait.php';
use \ViewTrait;
session_start();
class LoginController
{
    
    use ViewTrait;
    public function login()
    {
        if (isset($_POST['usuario']) && isset($_POST['password'])) {
            // Obtenha os dados do formulário de login
            $usuario = $_POST['usuario'];
            $senha = $_POST['password'];
        
            // Instanciar o modelo de login
            $loginModel = new LoginModel();
        
            // Realizar a validação e autenticação do usuário
            $loginModel->validateUser($usuario, $senha);
        } else {
            echo "Campos de usuário e senha não fornecidos.";
        }

        if ($loginModel->validateUser($usuario,$senha)) {
            // Usuário autenticado com sucesso
           
            $_SESSION['user_id'] = $usuario;
            header("Location: /home"); // Redireciona para a página de sucesso
            exit();
        } else {
            // Falha na autenticação do usuário
            echo "Usuário ou senha inválidos"; // Exibe mensagem de erro
        }
        

    }
    public function logout(){
        
        unset($_SESSION['user_id']);
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        $redirectUrl = $baseUrl . "/home";
        header("Location: " . $redirectUrl);
        exit;
    }
}
