<?php

    include_once "conexao.php";

    $nome = $_POST['nome'];
    $tarefa = $_POST['tarefa'];
    $celular = $_POST['celular'];

    $sql_verifica = "SELECT * FROM tarefas WHERE tar_celular = :CELULAR";
    $stmt_verifica = $conexao->prepare($sql_verifica);

    $stmt_verifica->bindParam(':CELULAR', $celular);
    $stmt_verifica->execute();

    if($stmt_verifica->rowCount() > 0){
        //Já está cadastrado
        echo json_encode(array("CAD"=>"CELULAR_DUPLICADO"));
    } else{
        //Vai cadastrar um novo
        $sql_salvar = "INSERT INTO tarefas (tar_nome, tar_tarefa, tar_celular)";
        $sql_salvar .= "VALUES(:NOME, :TAREFA, :CELULAR)";

        $stmt_salvar = $conexao->prepare($sql_salvar);

        $stmt_salvar->bindParam(':NOME', $nome);
        $stmt_salvar->bindParam(':TAREFA', $tarefa);
        $stmt_salvar->bindParam(':CELULAR', $celular);

    if($stmt_salvar->execute()){
            //Salvo com sucesso
            echo json_encode(array("CAD"=>"OK"));
    } else{
        // Ocorreu erro
        echo json_encode(array("CAD"=>"ERRO"));
    }
    }
?>