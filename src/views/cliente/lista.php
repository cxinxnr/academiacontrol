<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/header.php');?>

<head>
    <title>Listagem de Clientes</title>
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
    <h1>Listagem de Clientes</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data Nascimento</th>
                <th>Gênero</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Objetivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td><?php echo $cliente['cliente_id']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $cliente['telefone']; ?></td>
                    <td><?php echo $cliente['data_nascimento']; ?></td>
                    <td><?php echo $cliente['genero']; ?></td>
                    <td><?php echo $cliente['altura']; ?></td>
                    <td><?php echo $cliente['peso']; ?></td>
                    <td><?php echo $cliente['objetivo']; ?></td>
                    <td>
                        <a href="/editar-cliente/<?php echo $cliente['cliente_id']; ?>">Editar</a>
                        <button onclick="confirmarExclusao(<?php echo $cliente['cliente_id']; ?>)">Excluir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php require($_SERVER['DOCUMENT_ROOT'] . '/src/views/layout/footer.php');?>

    <script>
        function confirmarExclusao(id) {
            if (confirm('Deseja realmente excluir este cliente?')) {
                // Redirecionar para a página de exclusão passando o ID do cliente
                window.location.href = '/excluir-cliente/' + id;
            }
        }
    </script>
</body>
