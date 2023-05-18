<?php
namespace App\Models;
use PDO;

require 'conexao.php';
class ClienteModel
{
    public function inserirCliente($nome, $email, $telefone, $data_nascimento, $genero, $altura, $peso, $objetivo)
    {
       
            $bd = \Conexao::getInstancia();

        if (!$bd) {
                echo "Erro na conexão com o banco de dados.";
            return;
        }
            $query = "INSERT INTO cliente (nome, email, telefone, data_nascimento, genero, altura, peso, objetivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insert = $bd->prepare($query);
            $insert->execute([$nome, $email, $telefone, $data_nascimento, $genero, $altura, $peso, $objetivo]);

            $clienteId = $bd->lastInsertId();
            
            return $clienteId;
            
        }
        public function editarCliente($clienteId, $nome, $email, $telefone, $data_nascimento, $genero, $altura, $peso, $objetivo)
        {
            $bd = \Conexao::getInstancia();
        
            if (!$bd) {
                echo "Erro na conexão com o banco de dados.";
                return;
            }
            $query = "UPDATE cliente SET nome = ?, email = ?, telefone = ?, data_nascimento = ?, genero = ?, altura = ?, peso = ?, objetivo = ? WHERE cliente_id = ?";
            $update = $bd->prepare($query);
            $update->execute([$nome, $email, $telefone, $data_nascimento, $genero, $altura, $peso, $objetivo, $clienteId]);
        
            if ($update->rowCount() > 0) {
                echo "Cliente atualizado com sucesso.";
            } else {
                echo "Nenhum cliente foi atualizado.";
            }
        }
        public function buscarClientes()
        {
        $bd = \Conexao::getInstancia();
        $query = "SELECT * FROM cliente";
        $stmt = $bd->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function buscarCliente($id){
            $bd = \Conexao::getInstancia();
            $query = "SELECT * FROM cliente WHERE cliente_id = :id";
            $stmt = $bd->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($result);
    
            return $result;
        }
        public function excluirCliente($id) {
            $bd = \Conexao::getInstancia();
            $query = "DELETE FROM cliente WHERE cliente_id = ?";
            $stmt = $bd->prepare($query);
            $stmt->execute([$id]);
        }
}