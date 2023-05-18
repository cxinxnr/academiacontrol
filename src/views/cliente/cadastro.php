<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/header.php');?>

<div class="content">
    <h1>Cadastro de Clientes</h1>

    <form action="/cadastro-cliente" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" required>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" required>

        <label for="genero">Gênero:</label>
        <select name="genero" id="genero" required>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select>

        <label for="altura">Altura (cm):</label>
        <input type="number" name="altura" id="altura" required>

        <label for="peso">Peso (kg):</label>
        <input type="number" name="peso" id="peso" required>

        <label for="objetivo">Objetivo:</label>
        <textarea name="objetivo" id="objetivo" required></textarea>

        <button type="submit">Cadastrar</button>
    </form>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/footer.php');?>
