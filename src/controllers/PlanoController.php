<?php
namespace App\Controllers;
use App\Models\PlanoModel;
require './src/traits/ViewTrait.php';

class PlanoController
{
    use \ViewTrait;
    public function exibeCadastro()
    {
        session_start();
        // Verifica se o usuário está logado
        if ($this->isUserLoggedIn()) {
            // Se o usuário estiver logado, exiba a página
            $this->view('/plano/cadastro');
        } else {
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/home";
            header("Location: " . $redirectUrl);
            exit;

        }
    }
    public function enviaFormCadastro()
    {
         // Verifica se o formulário foi submetido
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $nome_plano = $_POST['nome_plano'];
            $descricao = $_POST['descricao'];
            $valor = $_POST['valor'];
            $beneficios = $_POST['beneficios'];


            // Verifica se os campos obrigatórios foram preenchidos
            if (empty($nome_plano) || empty($descricao) || empty($valor)|| empty($beneficios)) {
                echo "Por favor, preencha todos os campos obrigatórios.";
                return;
            }
            echo $_POST['nome_plano'] . $_POST['descricao']. $_POST['valor'] . $_POST['beneficios'];


            // Agora você pode enviar os dados para o modelo para inserção no banco de dados
            $planoModel = new PlanoModel();
            $planoModel->inserirPlano($nome_plano, $descricao, $valor, $beneficios);

            // Redireciona o usuário para uma página de sucesso ou exibe uma mensagem de sucesso
            echo "Plano cadastrado com sucesso!";
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-plano";
            header("Location: " . $redirectUrl);
        } else {
            // Se o formulário não foi submetido via POST, redirecione para a página de exibição do formulário

            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-plano";
            header("Location: " . $redirectUrl);
            exit;
        }
    }
    
    public function listarPlanos()
    {

        session_start();
        // Verifica se o usuário está logado
        if ($this->isUserLoggedIn()) {

            $planoModel = new PlanoModel();
            $planos = $planoModel->buscarPlanos();
    
            // Passar os dados para a view de listagem de aulas
            $this->view('/plano/lista',['planos' => $planos]);

        } else {
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/home";
            header("Location: " . $redirectUrl);
            exit;
        }
    }

    public function buscarPlano($id)
    {

        session_start();
        // Verifica se o usuário está logado
        if ($this->isUserLoggedIn()) {

            $planoModel = new PlanoModel();
            $plano = $planoModel->buscarPlano($id);
            if (!$plano) {
                echo "Plano não encontrada.";      
            }
        
            $this->view('/plano/editar',['plano' => $plano]);
            
        } else {
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/home";
            header("Location: " . $redirectUrl);
            exit;
        }


    }
    public function enviaFormEdicao(){
        
         // Verifica se o formulário foi submetido
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $id = $_POST['plano_id'];
            $nome_plano = $_POST['nome_plano'];
            $descricao = $_POST['descricao'];
            $valor = $_POST['valor'];
            $beneficios = $_POST['beneficios'];

            if (empty($id) || empty($nome_plano) || empty($descricao) || empty($valor) || empty($beneficios)) {
                echo "Por favor, preencha todos os campos obrigatórios.";
                return;
            }
            echo $_POST['plano_id'] . $_POST['nome_plano'] . $_POST['descricao']. $_POST['valor'] . $_POST['beneficios'];

            $planoModel = new PlanoModel();
            $planoModel->editarPlano($id, $nome_plano, $descricao, $valor,$beneficios);
            echo "Plano editado com sucesso!";

            //leva para a lista novamente
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-plano";
            header("Location: " . $redirectUrl);

        } else {
            // Se o formulário não foi submetido via POST, redirecione para a página de exibição do formulário
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-plano";
            header("Location: " . $redirectUrl);
            exit;
        }
    }
    public function excluirPlano($id) {
        $planoModel = new PlanoModel();
        $planoModel->excluirPlano($id);
    
        // Redirecionar para a lista de aula após a exclusão
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        $redirectUrl = $baseUrl . "/lista-plano";
        header("Location: " . $redirectUrl);
        exit();
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
