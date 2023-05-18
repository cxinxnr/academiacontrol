<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/header.php');?>

<head>
    <title>Listagem de Aulas</title>
    <style>
        /* Estilos CSS para a tabela */
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto; /* Centralizar a tabela */
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos CSS para os botões */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Listagem de Aulas</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Instrutor</th>
                <th>Dia da Semana</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aulas as $aula) : ?>
                <tr>
                    <td><?php echo $aula['aula_id']; ?></td>
                    <td><?php echo $aula['nome_aula']; ?></td>
                    <td><?php echo $aula['instrutor_responsavel']; ?></td>
                    <td><?php echo $aula['dia_semana']; ?></td>
                    <td>
                        <a href="/editar-aula/<?php echo $aula['aula_id']; ?>">Editar</a>
                        <button onclick="confirmarExclusao(<?php echo $aula['aula_id']; ?>)">Excluir</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/footer.php');?>

        
        <script>
            function confirmarExclusao(id) {
                if (confirm('Deseja realmente excluir esta aula?')) {
                    // Redirecionar para a página de exclusão passando o ID da aula
                    window.location.href = '/excluir-aula/' + id;
                }
            }
            </script>