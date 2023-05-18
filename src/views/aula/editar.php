<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/header.php');?>

<div class="content">
    <h1>Editar Aula</h1>
    
    <form action="/editar-aula" method="POST">
        <input type="hidden" name="aula_id" value="<?php echo $aula['aula_id']; ?>">
        
        <label for="nome_aula">Nome da Aula:</label>
        <input type="text" name="nome_aula" id="nome_aula" value="<?php echo $aula['nome_aula']; ?>" required>
        
        <label for="instrutor_responsavel">Instrutor Responsável:</label>
        <input type="text" name="instrutor_responsavel" id="instrutor_responsavel" value="<?php echo $aula['instrutor_responsavel']; ?>" required>
        
        <label for="dia_semana">Dia da Semana:</label>
        <select name="dia_semana" id="dia_semana" required>
            <option value="Segunda-feira" <?php if ($aula['dia_semana'] === 'Segunda-feira') echo 'selected'; ?>>Segunda-feira</option>
            <option value="Terça-feira" <?php if ($aula['dia_semana'] === 'Terça-feira') echo 'selected'; ?>>Terça-feira</option>
            <option value="Quarta-feira" <?php if ($aula['dia_semana'] === 'Quarta-feira') echo 'selected'; ?>>Quarta-feira</option>
            <option value="Quinta-feira" <?php if ($aula['dia_semana'] === 'Quinta-feira') echo 'selected'; ?>>Quinta-feira</option>
            <option value="Sexta-feira" <?php if ($aula['dia_semana'] === 'Sexta-feira') echo 'selected'; ?>>Sexta-feira</option>
            <option value="Sábado" <?php if ($aula['dia_semana'] === 'Sábado') echo 'selected'; ?>>Sábado</option>
            <option value="Domingo" <?php if ($aula['dia_semana'] === 'Domingo') echo 'selected'; ?>>Domingo</option>
        </select>
        
        <button type="submit">Salvar</button>
    </form>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/footer.php');?>