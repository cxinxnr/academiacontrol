<?php
namespace App\Models;

require 'conexao.php';
use PDO;
class AulaModel
{
    public function inserirAula($nome_aula, $instrutor_responsavel, $dia_semana)
    {
       
            $bd = \Conexao::getInstancia();

        if (!$bd) {
                echo "Erro na conexão com o banco de dados.";
            return;
        }
            $query = "INSERT INTO aula (nome_aula, instrutor_responsavel, dia_semana) VALUES (?, ?, ?)";
            $insert = $bd->prepare($query);
            $insert->execute([$nome_aula, $instrutor_responsavel, $dia_semana]);

            $planoId = $bd->lastInsertId();
            echo $planoId;
            return $planoId;
            
        }
        public function editarAula($aulaId, $nome_aula, $instrutor_responsavel, $dia_semana)
        {
            $bd = \Conexao::getInstancia();
        
            if (!$bd) {
                echo "Erro na conexão com o banco de dados.";
                return;
            }
            $query = "UPDATE aula SET nome_aula = ?, instrutor_responsavel = ?, dia_semana = ? WHERE aula_id = ?";
            $update = $bd->prepare($query);
            $update->execute([$nome_aula, $instrutor_responsavel, $dia_semana, $aulaId]);
        
            if ($update->rowCount() > 0) {
                echo "Aula atualizado com sucesso.";
            } else {
                echo "Nenhuma aula foi atualizado.";
            }
        }
        
        public function buscarAulas()
        {
        $bd = \Conexao::getInstancia();
        $query = "SELECT * FROM aula";
        $stmt = $bd->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function buscarAula($id){
            $bd = \Conexao::getInstancia();
            $query = "SELECT * FROM aula WHERE aula_id = :id";
            $stmt = $bd->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($result);
    
            return $result;
        }
        public function excluirAula($id) {
            $bd = \Conexao::getInstancia();
            $query = "DELETE FROM aula WHERE aula_id = ?";
            $stmt = $bd->prepare($query);
            $stmt->execute([$id]);
        }
}