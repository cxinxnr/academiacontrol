<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/header.php');?>


<div class="content">
    <h1>Cadastro de Aula</h1>
    
    <form action="/cadastro-aula" method="POST">
        <label for="nome_aula">Nome da Aula:</label>
        <input type="text" name="nome_aula" id="nome_aula" required>
        
        <label for="instrutor_responsavel">Instrutor Responsável:</label>
        <input type="text" name="instrutor_responsavel" id="instrutor_responsavel" required>
        
        <label for="dia_semana">Dia da Semana:</label>
        <select name="dia_semana" id="dia_semana" required>
            <option value="Segunda-feira">Segunda-feira</option>
            <option value="Terça-feira">Terça-feira</option>
            <option value="Quarta-feira">Quarta-feira</option>
            <option value="Quinta-feira">Quinta-feira</option>
            <option value="Sexta-feira">Sexta-feira</option>
            <option value="Sábado">Sábado</option>
            <option value="Domingo">Domingo</option>
        </select>
        
        <button type="submit">Cadastrar</button>
    </form>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/footer.php');?>
