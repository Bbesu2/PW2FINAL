<?php
require '../config.php';
$midias = $pdo->query("SELECT * FROM midias")->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Lista de usuários</h1>
<a href="midia-create.php">Cadastrar novo</a><br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>Tipo</th>
        <th>Nome</th>
        <th>Gênero</th>
        <th>Ano de Lançamento</th>
    </tr>

    <?php foreach ($midias as $m): ?>
        <tr>
            <td><?= $m["tipo"] ?></td>
            <td><?= $m["nome"] ?></td>
            <td><?= $m["genero"] ?></td>
            <td><?= $m["anoLanc"] ?></td>
            <td><?= $m["sinopse"] ?></td>
            <td><?= $m["clasInd"] ?></td>
            <td>
                <a href="midia-update.php?id=<?= $m['tipo'] ?>">Editar</a> |
                <a href="midia-delete.php?id=<?= $m['tipo'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>