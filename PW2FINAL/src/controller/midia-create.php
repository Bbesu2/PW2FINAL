<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Mídia</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        h4 {
            margin: 0 0 15px 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }

        label {
            display: block;
            margin: 10px 0 4px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #aaa;
            border-radius: 5px;
            font-size: 15px;
        }

        button,
        .btn-voltar {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-voltar {
            background: #d9534f;
            float: right;
        }

        button:hover,
        .btn-voltar:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <?php 'navbar.php'; ?>

    <div class="container">
        <h4>Adicionar Mídia
            <a href="../view/Usuarios.php" class="btn-voltar">Voltar</a>
        </h4>

        <form action="../view/Usuarios.php" method="POST">

            <label>Nome</label>
            <input type="text" name="nome">

            <label>Mídia</label>
            <select name="midia">
                <option value="" disabled selected>Selecione uma das opções</option>
                <option value="filme">Filme</option>
                <option value="serie">Serie</option>


                <div id="quantEpisodio" style="display:none;">
                    <label>Episódio:</label><br>
                    <input type="number" name="episodio" min="1"><br><br>
                </div>

                <button type="submit">Cadastrar</button>
        </form>

        <script>
            const tipoSelect = document.getElementById('tipo');
            const episodio = document.getElementById('quantEpisodio');

            tipoSelect.addEventListener('change', function () {
                if (this.value === 'Serie') {
                    episodio.style.display = 'block';
                } else {
                    episodio.style.display = 'none';
                }
            });

        </script>

        </select>

        <label>Ano de Lançamento</label>
        <input type="text" name="anoLanc">

        <label>Genero</label>
        <select name="genero">
            <option value="" disabled selected>Selecione uma das opções</option>
            <option value="terror">Terror</option>
            <option value="romance">Romance</option>
            <option value="ficcao">Ficção Científica</option>
            <option value="comedia">Comédia</option>
            <option value="drama">Drama</option>
            <option value="animacao">Animação</option>
        </select>

        <label for="sinopse">Sinopse</label>
        <input name="sinopse" id="sinopse" type="text"></input>

        <button type="submit" name="midia-create">Salvar</button>
        </form>
    </div>

</body>

</html>