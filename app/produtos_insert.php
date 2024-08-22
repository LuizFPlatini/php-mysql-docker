<?php

     $conn = new \PDO('mysql:host=db;dbname=application', 'root', 'rootpass');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $comando = $conn->prepare('insert into produtos(nome, quantidade) values (:n, :q)');
        $comando->execute([':n' => $_POST['nome'], ':q' => $_POST['quantidade']]);

    }

    $select = $conn-> prepare('select * from produtos');
    $select->execute();

    $lista = $select -> fetchAll(\PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Novo Produto</h1>
    <form action="/produto_insert.php" method="post">
        <label>Nome</label>
        <input type="text" name="nome"/>
        <label>Quantidade</label>
        <input type="number" name="quantidade">
        <button type="submit">Salvar</button>
    </form>
    <hr/>
    <ul>
        <?php foreach($lista as $item): ?>
        <li><?$item['nome'] ?> : <? $item[quantidade] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>