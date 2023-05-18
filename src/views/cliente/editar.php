<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/header.php');?>

<div class="content">
    <h1>Editar Cliente</h1>

    <form action="/editar-cliente" method="POST">
        <input type="hidden" name="cliente_id" value="<?php echo $cliente['cliente_id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $cliente['nome']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $cliente['email']; ?>" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" value="<?php echo $cliente['telefone']; ?>" required>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $cliente['data_nascimento']; ?>" required>

        <label for="genero">Gênero:</label>
        <select name="genero" id="genero" required>
            <option value="Masculino" <?php if ($cliente['genero'] === 'Masculino') echo 'selected'; ?>>Masculino</option>
            <option value="Feminino" <?php if ($cliente['genero'] === 'Feminino') echo 'selected'; ?>>Feminino</option>
            <option value="Outro" <?php if ($cliente['genero'] === 'Outro') echo 'selected'; ?>>Outro</option>
        </select>

        <label for="altura">Altura (cm):</label>
        <input type="number" name="altura" id="altura" value="<?php echo $cliente['altura']; ?>" required>

        <label for="peso">Peso (kg):</label>
        <input type="number" name="peso" id="peso" value="<?php echo $cliente['peso']; ?>" required>

        <label for="objetivo">Objetivo:</label>
        <textarea name="objetivo" id="objetivo" required><?php echo $cliente['objetivo']; ?></textarea>

        <button type="submit">Salvar</button>
    </form>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/footer.php');?>
