<?php
namespace App\Models;

require 'conexao.php';
class LoginModel
{
    public function validateUser($usuario, $senha)
    {
        // Verifica se os campos de usuário e senha estão vazios
        if (empty($usuario) || empty($senha)) {
            echo "Por favor, forneça um nome de usuário e senha.";
            return;
        }
            $bd = \Conexao::getInstancia();
            // Obtém a conexão com o banco de dados

            // Verifica se a conexão foi estabelecida com sucesso
        if (!$bd) {
                echo "Erro na conexão com o banco de dados.";
            return;
        }
            // Executa a consulta
            $query = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";
        $resultado = $bd->query($query);
            
        if ($resultado->rowCount() > 0) {
                        return true;
                    } else {
                        return false;
                    
        }
        }
}