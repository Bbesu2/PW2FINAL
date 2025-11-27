<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/FilmeModel.php';
require_once __DIR__ . '/../model/SerieModel.php';
require_once __DIR__ . '/../controller/FilmeController.php';
require_once __DIR__ . '/../controller/SerieController.php';

$db = (new Database())->getConnection();
$serieController = new SerieController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

 $episodio = isset($_POST['episodio']) ? (int)$_POST['episodio'] : null;

$serie = new SerieModel(
    $_POST['nome'],
    Genero::from($_POST['genero']),
    (int)$_POST['anoLanc'],
    $_POST['sinopse'],
    Clas::from($_POST['clasInd']),
    Tipo::from($_POST['tipo']),
    $episodio
);

try {
    $serieController->add($serie);
    echo "<p style='color:green'>Série adicionada com sucesso!</p>";
} catch (PDOException $e) {
    echo "<p style='color:red'>Erro: " . $e->getMessage() . "</p>";
}
}

// Listar mídias cadastradas
$midias = $serieController->list() ?? [];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de series</title>
</head>
<body>
    <h1>Cadastro de Series</h1>

    <!-- Formulário -->
    <form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Gênero:</label><br>
    <select name="genero" required>
        <option value="Romance">Romance</option>
        <option value="Ação">Ação</option>
        <option value="Comédia">Comédia</option>
        <option value="Animação">Animação</option>
        <option value="Terror">Terror</option>
        <option value="Ficção">Ficção</option>
    </select><br><br>

    <label>Ano de Lançamento:</label><br>
    <input type="number" min="1900" name="anoLanc" required><br><br>

    <label>Sinopse:</label><br>
    <textarea name="sinopse" required></textarea><br><br>

    <label>Classificação:</label><br>
    <select name="clasInd" required>
        <option value="Livre">Livre</option>
        <option value="10">10</option>
        <option value="12">12</option>
        <option value="14">14</option>
        <option value="16">16</option>
        <option value="18">18</option>
    </select><br><br>

    <label>Tipo:</label><br>
    <select name="tipo" id="tipo" required>
        <option value="Filme">Filme</option>
        <option value="Serie">Série</option>
    </select><br><br>

    <!-- Campo Episódio (inicialmente escondido) -->
    <div id="Quantidadedeepisodios" style="display:none;">
        <label>Episódio:</label><br>
        <input type="number" name="episodio" min="1"><br><br>
    </div>

    <button type="submit">Cadastrar</button>
</form>

<script>
    const tipoSelect = document.getElementById('tipo');
    const episodioField = document.getElementById('Quantidadedeepisodios');

    tipoSelect.addEventListener('change', function() {
        if (this.value === 'Serie') {
            episodioField.style.display = 'block';
        } else {
            episodioField.style.display = 'none';
        }
    });

</script>

    <hr>

    <!-- Lista de mídias -->
    <h2>series cadastradas</h2>
<?php if (!empty($midias)): ?>
    <?php foreach ($midias as $m): ?>
        <p>
            <?= htmlspecialchars($m['nome']) ?> (<?= htmlspecialchars($m['anoLanc']) ?>) -
            <?= htmlspecialchars($m['genero']) ?> | <?= htmlspecialchars($m['tipo']) ?>
        </p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhuma serie cadastrada.</p>
<?php endif; ?>
</body>
</html>