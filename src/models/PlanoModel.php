<?php
namespace App\Models;

require 'conexao.php';
use PDO;
class PlanoModel
{
    public function inserirPlano($nome_plano, $descricao, $valor, $beneficios)
    {
       
            $bd = \Conexao::getInstancia();

        if (!$bd) {
                echo "Erro na conexão com o banco de dados.";
            return;
        }
            $query = "INSERT INTO plano (nome_plano, descricao, valor, beneficios) VALUES (?, ?, ?, ?)";
            $insert = $bd->prepare($query);
            $insert->execute([$nome_plano, $descricao, $valor, $beneficios]);

            $planoId = $bd->lastInsertId();
            echo $planoId;
            return $planoId;
            
        }
        public function editarPlano($planoId, $nome_plano, $descricao, $valor, $beneficios)
        {
            $bd = \Conexao::getInstancia();
        
            if (!$bd) {
                echo "Erro na conexão com o banco de dados.";
                return;
            }
            $query = "UPDATE plano SET nome_plano = ?, descricao = ?, valor = ?, beneficios = ? WHERE plano_id = ?";
            $update = $bd->prepare($query);
            $update->execute([$nome_plano, $descricao, $valor, $beneficios, $planoId]);
        
            if ($update->rowCount() > 0) {
                echo "Plano atualizado com sucesso.";
            } else {
                echo "Nenhum plano foi atualizado.";
            }
        }
        
        public function buscarPlanos()
        {
        $bd = \Conexao::getInstancia();
        $query = "SELECT * FROM plano";
        $stmt = $bd->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function buscarPlano($id){
            $bd = \Conexao::getInstancia();
            $query = "SELECT * FROM plano WHERE plano_id = :id";
            $stmt = $bd->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($result);
    
            return $result;
        }
        public function excluirPlano($id) {
            $bd = \Conexao::getInstancia();
            $query = "DELETE FROM plano WHERE plano_id = ?";
            $stmt = $bd->prepare($query);
            $stmt->execute([$id]);
        }
}