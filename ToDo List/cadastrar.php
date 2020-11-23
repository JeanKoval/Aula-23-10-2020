<?php

require "src/classes/Tarefa.php";
require "src/classes/ArquivoTarefa.php";


if (isset($_POST)&&isset($_FILES)) {

    $nomeArqvuivo = $_FILES['img']['name'];
    $arquivo = file_get_contents($_FILES['img']['tmp_name']);
    file_put_contents("img/$nomeArqvuivo", $arquivo);

    $caminhoImg = "img/". $nomeArqvuivo;

    $tarefa = new Tarefa(1, $_POST['nome'], $_POST['descricao'], $_POST['dataLimite'], $caminhoImg);
    $arquivoTarefa = new ArquivoTarefa('tarefas.json');
    
    // recupera as tarefas
    $arrTarefas = $arquivoTarefa->le();
    $arrTarefas[] = $tarefa;
    $arquivoTarefa->salva($arrTarefas);

    header('Location: /');
}