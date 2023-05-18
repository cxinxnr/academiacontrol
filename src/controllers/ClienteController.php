<?php
namespace App\Controllers;
use App\Models\ClienteModel;
require './src/traits/ViewTrait.php';

class ClienteController
{
    use \ViewTrait;
    public function exibeCadastro()
    {
        session_start();
        // Verifica se o usuário está logado
        if ($this->isUserLoggedIn()) {
            // Se o usuário estiver logado, exiba a página
            $this->view('/cliente/cadastro');
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
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data_nascimento = $_POST['data_nascimento'];
            $genero = $_POST['genero'];
            $altura = $_POST['altura'];
            $peso = $_POST['peso'];
            $objetivo = $_POST['objetivo'];

            // Verifica se os campos obrigatórios foram preenchidos
            if (empty($nome) || empty($email) || empty($telefone)|| empty($data_nascimento)|| empty($genero)|| empty($altura)|| empty($peso)|| empty($objetivo) ) {
                echo "Por favor, preencha todos os campos obrigatórios.";
                return;
            }
            echo $_POST['nome'] . $_POST['email']. $_POST['telefone'] . $_POST['data_nascimento'] . $_POST['genero'].  $_POST['altura'] . $_POST['peso'] .  $_POST['objetivo'];


            // Agora você pode enviar os dados para o modelo para inserção no banco de dados
            $clienteModel = new ClienteModel();
            $clienteModel->inserirCliente($nome, $email, $telefone, $data_nascimento, $genero, $altura, $peso, $objetivo);

            // Redireciona o usuário para uma página de sucesso ou exibe uma mensagem de sucesso
            echo "Cliente cadastrado com sucesso!";

            header("Location: /lista-cliente");
            exit;
        } else {
            // Se o formulário não foi submetido via POST, redirecione para a página de exibição do formulário
            header("Location: /cadastro-cliente");
            exit;
        }
    }
    public function listarClientes()
    {

        session_start();
        // Verifica se o usuário está logado
        if ($this->isUserLoggedIn()) {
            $clienteModel = new ClienteModel();
            $clientes = $clienteModel->buscarClientes();
    
            // Passar os dados para a view de listagem de aulas
            $this->view('/cliente/lista',['clientes' => $clientes]);
        } else {
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/home";
            header("Location: " . $redirectUrl);
            exit;
        }

    }
    public function buscarCliente($id)
    {
        session_start();
        // Verifica se o usuário está logado
        if ($this->isUserLoggedIn()) {
            // Lógica para recuperar o cliente com o ID especificado
            $clienteModel = new ClienteModel();
            $cliente = $clienteModel->buscarCliente($id);
            // Verificar se o cliente existe
            if (!$cliente) {
                // Cliente não encontrado, redirecionar para uma página de erro ou exibir uma mensagem de erro
                echo "Cliente não encontrado.";      
            }
        
            // Passar o cliente para a view de edição
            $this->view('/cliente/editar',['cliente' => $cliente]);
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
            $id = $_POST['cliente_id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data_nascimento = $_POST['data_nascimento'];
            $genero = $_POST['genero'];
            $altura = $_POST['altura'];
            $peso = $_POST['peso'];
            $objetivo = $_POST['objetivo'];

            // Verifica se os campos obrigatórios foram preenchidos
            if (empty($id) || empty($nome) || empty($email) || empty($telefone)|| empty($data_nascimento)|| empty($genero)|| empty($altura)|| empty($peso)|| empty($objetivo) ) {
                echo "Por favor, preencha todos os campos obrigatórios.";
                return;
            }
            echo $_POST['cliente_id'] . $_POST['nome'] . $_POST['email']. $_POST['telefone'] . $_POST['data_nascimento'] . $_POST['genero'].  $_POST['altura'] . $_POST['peso'] .  $_POST['objetivo'];


            // Agora você pode enviar os dados para o modelo para inserção no banco de dados
            $clienteModel = new ClienteModel();
            $clienteModel->editarCliente($id, $nome, $email, $telefone, $data_nascimento, $genero, $altura, $peso, $objetivo);

            // Redireciona o usuário para uma página de sucesso ou exibe uma mensagem de sucesso
            echo "Cliente editado com sucesso!";

            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-cliente";
            header("Location: " . $redirectUrl);

        } else {
            // Se o formulário não foi submetido via POST, redirecione para a página de exibição do formulário
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-cliente";
            header("Location: " . $redirectUrl);
            exit;
        }
    }
    public function excluirCliente($id) {
        $clienteModel = new ClienteModel();
        $clienteModel->excluirCliente($id);
    
        // Redirecionar para a lista de clientes após a exclusão
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        $redirectUrl = $baseUrl . "/lista-cliente";
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
