<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/header.php');?>

<head>
    <title>Listagem de Planos</title>
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
    <h1>Listagem de Planos</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Beneficios</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($planos as $plano) : ?>
                <tr>
                    <td><?php echo $plano['plano_id']; ?></td>
                    <td><?php echo $plano['nome_plano']; ?></td>
                    <td><?php echo $plano['descricao']; ?></td>
                    <td><?php echo $plano['valor']; ?></td>
                    <td><?php echo $plano['beneficios']; ?></td>
                    <td>
                        <a href="/editar-plano/<?php echo $plano['plano_id']; ?>">Editar</a>
                        <button onclick="confirmarExclusao(<?php echo $plano['plano_id']; ?>)">Excluir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/footer.php');?>

    <script>
        function confirmarExclusao(id) {
            if (confirm('Deseja realmente excluir este Plano?')) {
                // Redirecionar para a página de exclusão passando o ID do cliente
                window.location.href = '/excluir-plano/' + id;
            }
        }
    </script>
</body>
