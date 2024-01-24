<?php

    include_once "conexao.php";

    $id = $_POST['id'];

    $sql_excluir = "DELETE FROM tarefas tar_id = :ID";

    $stmt_excluir = $conexao->prepare($sql_excluir);

    $stmt_excluir->bindParam(':ID', $id);

    if($stmt_excluir->execute()){
        //Deletado com sucesso
        echo json_encode(array("DEL"=>"OK"));
    } else{
        //Ocorreu erro ao deletar
        echo json_encode(array("DEL"=>"ERRO"));
    }
?>