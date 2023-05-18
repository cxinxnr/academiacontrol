<?php
namespace App\Controllers;
use App\Models\AulaModel;
require './src/traits/ViewTrait.php';

class AulaController
{
    use \ViewTrait;
    public function exibeCadastro()
    {
        session_start();
        // Verifica se o usuário está logado
        if ($this->isUserLoggedIn()) {
            // Se o usuário estiver logado, exiba a página
            $this->view('/aula/cadastro');
        } else {
            $this->view('login_view');
            exit;
        }
    }
    public function enviaFormCadastro()
    {
         // Verifica se o formulário foi submetido
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $nome_aula = $_POST['nome_aula'];
            $instrutor_responsavel = $_POST['instrutor_responsavel'];
            $dia_semana = $_POST['dia_semana'];
            


            // Verifica se os campos obrigatórios foram preenchidos
            if (empty($nome_aula) || empty($instrutor_responsavel) || empty($dia_semana)) {
                echo "Por favor, preencha todos os campos obrigatórios.";
                return;
            }
            echo $_POST['nome_aula'] . $_POST['instrutor_responsavel']. $_POST['dia_semana'];


            // Agora você pode enviar os dados para o modelo para inserção no banco de dados
            $aulaModel = new AulaModel();
            $aulaModel->inserirAula($nome_aula, $instrutor_responsavel, $dia_semana);

            // Redireciona o usuário para uma página de sucesso ou exibe uma mensagem de sucesso
            echo "Aula cadastrada com sucesso!";
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-aula";
            header("Location: " . $redirectUrl);
        } else {
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-aula";
            header("Location: " . $redirectUrl);
        }
    }
    public function listarAulas()
    {
        session_start();
        // Verifica se o usuário está logado
        if ($this->isUserLoggedIn()) {
           
            $aulaModel = new AulaModel();
            $aulas = $aulaModel->buscarAulas();

            // Passar os dados para a view de listagem de aulas
        $this->view('/aula/lista',['aulas' => $aulas]);
        } else {
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/home";
            header("Location: " . $redirectUrl);
            exit;
        }
    }

    public function buscarAula($id)
    {
        session_start();
        // Verifica se o usuário está logado
        if ($this->isUserLoggedIn()) {
            
            $aulaModel = new AulaModel();
            $aula = $aulaModel->buscarAula($id);
            if (!$aula) {
                echo "Aula não encontrada.";      
            }
        
            // Passar o cliente para a view de edição
            $this->view('/aula/editar',['aula' => $aula]);

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
            $id = $_POST['aula_id'];
            $nome_aula = $_POST['nome_aula'];
            $instrutor_responsavel = $_POST['instrutor_responsavel'];
            $dia_semana = $_POST['dia_semana'];

            if (empty($id) || empty($nome_aula) || empty($instrutor_responsavel) || empty($dia_semana)) {
                echo "Por favor, preencha todos os campos obrigatórios.";
                return;
            }
            echo $_POST['aula_id'] . $_POST['nome_aula'] . $_POST['instrutor_responsavel']. $_POST['dia_semana'];

            $aulaModel = new AulaModel();
            $aulaModel->editarAula($id, $nome_aula, $instrutor_responsavel, $dia_semana);
            echo "Cliente editado com sucesso!";

            //leva para a lista novamente
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-aula";
            header("Location: " . $redirectUrl);

        } else {
            // Se o formulário não foi submetido via POST, redirecione para a página de exibição do formulário
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $redirectUrl = $baseUrl . "/lista-aula";
            header("Location: " . $redirectUrl);
            exit;
        }
    }
    public function excluirAula($id) {
        $aulaModel = new AulaModel();
        $aulaModel->excluirAula($id);
    
        // Redirecionar para a lista de aula após a exclusão
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        $redirectUrl = $baseUrl . "/lista-aula";
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
