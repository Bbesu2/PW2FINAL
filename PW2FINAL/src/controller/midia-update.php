<?php
require '../config.php';

if (!isset($_GET["nome"])) {
    die("nome não encontrado");
}

$nome = $_GET["nome"];

// Atualizando
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $anoLanc = $_POST["anoLanc"];
    $tipo = $_POST["tipo"];
    $sinopse = $_POST["sinopse"];
    $clasInd = $_POST["clasInd"];

    $stmt = $pdo->prepare("UPDATE usuarios SET nome=?, tipo=? WHERE nome=?");
    $stmt->execute([$tipo, $nome, $genero, $anoLanc, $sinopse, $clasInd]);

    echo "Usuário atualizado!<br>";
    echo '<a href="midia-read.php">Voltar</a>';
    exit;
}

// Lendo dados atuais
$stmt = $pdo->prepare("SELECT * FROM midia WHERE nome=?");
$stmt->execute([$nome]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("midia não encontrado");
}
?>
<form method="post">
    Tipo: <input type="text" name="tipo" value="<?= $user['tipo'] ?>"><br><br>
    Nome: <input type="text" name="nome" value="<?= $user['nome'] ?>"><br><br>
    Gênero: <input type="password" name="senha" value="<?= $user['genero'] ?>"><br><br>
    Ano de Lançamento: <input type="number" name="anoLanc" value="<?= $user['anoLanc'] ?>"><br><br>
    Sinopse: <input type="text" name="tipo" value="<?= $user['tipo'] ?>"><br><br>
    Classificacao Indicativa: <input type="text" name="clasInd " value="<?= $user['nome'] ?>"><br><br>
        <button type="submit">Salvar</button>
</form>
<a href="midia-read.php">Cancelar</a>