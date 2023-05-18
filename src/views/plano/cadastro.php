<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/header.php');?>

<div class="content">
    <h1>Cadastro de Planos</h1>

    <form action="/cadastro-plano" method="POST">
        <label for="nome_plano">Nome do Plano:</label>
        <input type="text" name="nome_plano" id="nome_plano" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea>

        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" step="0.01" required>

        <label for="beneficios">Benefícios:</label>
        <textarea name="beneficios" id="beneficios" required></textarea>

        <button type="submit">Cadastrar</button>
    </form>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/footer.php');?>
