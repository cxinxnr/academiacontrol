<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/header.php');?>

<div class="content">
    <h1>Editar Plano</h1>

    <form action="/editar-plano" method="POST">
        <input type="hidden" name="plano_id" value="<?php echo $plano['plano_id']; ?>">
        
        <label for="nome_plano">Nome do Plano:</label>
        <input type="text" name="nome_plano" id="nome_plano" value="<?php echo $plano['nome_plano']; ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required><?php echo $plano['descricao']; ?></textarea>

        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" step="0.01" value="<?php echo $plano['valor']; ?>" required>

        <label for="beneficios">Benefícios:</label>
        <textarea name="beneficios" id="beneficios" required><?php echo $plano['beneficios']; ?></textarea>

        <button type="submit">Salvar</button>
    </form>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/footer.php');?>
