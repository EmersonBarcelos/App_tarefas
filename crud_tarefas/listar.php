<?php

    include_once "conexao.php";

    $sql_lista = "SELECT * FROM tarefas";
    $stmt_lista = $conexao->prepare($sql_lista);
    $stmt_lista->execute();

    $tarefas = array();

    while($dados = $stmt_lista->fetch(PDO::FETCH_OBJ)){
        $tarefas[] = array("ID"=>$dados->tar_id, "NOME"=>$dados->tar_nome, "TAREFA"=>$dados->tar_tarefa, "CELULAR"=>$dados->tar_celular);
    }

    echo json_encode($tarefas);

?>