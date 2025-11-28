<?php
require '../config.php';

if (!isset($_GET["nome"])) {
    die("nome não encontrado");
}

$nome = $_GET["nome"];

$stmt = $pdo->prepare("DELETE FROM Midia WHERE nome=?");
$stmt->execute([$nome]);

echo "Mídia excluída!<br>";
?>
<a href="midia-read.php">Voltar</a>