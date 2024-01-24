<?php

    include_once "conexao.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tarefa = $_POST['tarefa'];
    $celular = $_POST['celular'];

    $sql_atualizar = "UPDATE tarefas";
    $sql_atualizar .= "SET tar_nome = :NOME, tar_tarefa = :TAREFA, tar_celular = :CELULAR ";
    $sql_atualizar .= "WhERE tar_id = :ID";

    $stmt_atualizar = $conexao->prepare($sql_atualizar);

        $stmt_atualizar->bindParam(':ID', $id);
        $stmt_atualizar->bindParam(':NOME', $nome);
        $stmt_atualizar->bindParam(':TAREFA', $tarefa);
        $stmt_atualizar->bindParam(':CELULAR', $celular);

        if($stmt_atualizar->execute()){
        // Atualizado com sucesso
            echo json_encode(array("UP"=>"OK"));
    } else{
        // Ocorreu erro na atualização
        echo json_encode(array("UP"=>"ERRO"));
    }
?>