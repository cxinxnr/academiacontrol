<?php
namespace App\Controllers;

require './src/traits/ViewTrait.php';
use LoginController;
class HomeController
{
    use \ViewTrait;
    public function index()
    {
        $this->view('index_view');
    }
    public function dashboard()
    {
        session_start();
                // Verifica se o usuário está logado
                if ($this->isUserLoggedIn()) {
                    // Se o usuário estiver logado, exiba a página
                    $this->view('dashboard_view'); 
                } else {
                    $this->view('login_view');
                    exit;
                }
        
    }
    private function isUserLoggedIn()
{
    // Verifica se a variável de sessão do usuário está definida
    // ou qualquer outra lógica de autenticação que você esteja utilizando
    if (isset($_SESSION['user_id'])) {
        return true; // O usuário está logado
    } else {
        return false; // O usuário não está logado
    }
}
}