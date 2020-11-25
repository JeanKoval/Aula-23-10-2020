<?php
// index sera o ponto central

require "src/classes/Tarefa.php";
require "src/classes/ArquivoTarefa.php";

// esta linha redireciona qualquer requisição no index para o endereco
// header('Location: /resource/lista_tarefas.html');

if(isset($_POST['slc-stt'])){
    $escolha = $_POST['slc-stt'];
    if($escolha==0){
        $escolha=1;
    }
}else{
    $escolha = 1;
}

if(isset($_POST['slc-date'])){
    $opcao = $_POST['slc-date'];
    if($opcao==0){
        $opcao=1;
    }
}else{
    $opcao = 1;
}

$diaAtual = date('Y-m-d');

$template = file_get_contents('resource/lista_tarefas.html');

$arquivoTarefa = new ArquivoTarefa('tarefas.json');
$listaTarefasJSON = $arquivoTarefa->le();

$modeloTarefa = file_get_contents('resource/tarefa.html');

$linhasTabela = '';

if ($escolha == 1){
    foreach ($listaTarefasJSON as $tarefa) {
        switch($opcao){
            case 1:
                $tr = '';
                $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
                $tr = str_replace('#ID',     $tarefa->getId(), $tr);
                $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
                $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
                $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
                $tr = str_replace('#TODAS', $escolha == 1  ? 'selected' : '', $tr);
                $linhasTabela .= $tr;
            break;
            case 2:
                if($diaAtual == $tarefa->getDataLimite()){
                    $tr = '';
                    $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
                    $tr = str_replace('#ID',     $tarefa->getId(), $tr);
                    $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
                    $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
                    $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
                    $tr = str_replace('#TODAS', $escolha == 1  ? 'selected' : '', $tr);
                    $linhasTabela .= $tr;
                }
            break;
            case 3:
                if($tarefa->getDataLimite()>=($_POST['dateIni'])&&($tarefa->getDataLimite()<=$_POST['dateFin'])){
                    $tr = '';
                    $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
                    $tr = str_replace('#ID',     $tarefa->getId(), $tr);
                    $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
                    $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
                    $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
                    $tr = str_replace('#TODAS', $escolha == 1  ? 'selected' : '', $tr);
                    $linhasTabela .= $tr;
                }
            break;
            default:

        }
    }
}

if ($escolha == 2){
    foreach ($listaTarefasJSON as $tarefa) {
        if ($tarefa->getStatus() == 0){

            switch($opcao){
                case 1:
                    $tr = '';
                    $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
                    $tr = str_replace('#ID',     $tarefa->getId(), $tr);
                    $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
                    $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
                    $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
                    $tr = str_replace('#TODAS', $escolha == 1  ? 'selected' : '', $tr);
                    $linhasTabela .= $tr;
                break;
                case 2:
                    if($diaAtual == $tarefa->getDataLimite()){
                        $tr = '';
                        $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
                        $tr = str_replace('#ID',     $tarefa->getId(), $tr);
                        $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
                        $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
                        $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
                        $tr = str_replace('#TODAS', $escolha == 1  ? 'selected' : '', $tr);
                        $linhasTabela .= $tr;
                    }
                break;
                case 3:
                    if($tarefa->getDataLimite()>=($_POST['dateIni'])&&($tarefa->getDataLimite()<=$_POST['dateFin'])){
                        $tr = '';
                        $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
                        $tr = str_replace('#ID',     $tarefa->getId(), $tr);
                        $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
                        $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
                        $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
                        $tr = str_replace('#TODAS', $escolha == 1  ? 'selected' : '', $tr);
                        $linhasTabela .= $tr;
                    }
                break;
                default:

            }
        }
    }
}

if ($escolha == 3){
    foreach ($listaTarefasJSON as $tarefa){
        if ($tarefa->getStatus() == 1){
            switch($opcao){
                case 1:
                    $tr = '';
                    $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
                    $tr = str_replace('#ID',     $tarefa->getId(), $tr);
                    $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
                    $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
                    $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
                    $tr = str_replace('#TODAS', $escolha == 1  ? 'selected' : '', $tr);
                    $linhasTabela .= $tr;
                break;
                case 2:
                    if($diaAtual == $tarefa->getDataLimite()){
                        $tr = '';
                        $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
                        $tr = str_replace('#ID',     $tarefa->getId(), $tr);
                        $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
                        $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
                        $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
                        $tr = str_replace('#TODAS', $escolha == 1  ? 'selected' : '', $tr);
                        $linhasTabela .= $tr;
                    }
                break;
                case 3:
                    if($tarefa->getDataLimite()>=($_POST['dateIni'])&&($tarefa->getDataLimite()<=$_POST['dateFin'])){
                        $tr = '';
                        $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
                        $tr = str_replace('#ID',     $tarefa->getId(), $tr);
                        $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
                        $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
                        $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
                        $tr = str_replace('#TODAS', $escolha == 1  ? 'selected' : '', $tr);
                        $linhasTabela .= $tr;
                    }
                break;
                default:    
        
            }
        }
    }
}

// foreach ($listaTarefasJSON as $tarefa) {
//     $tr = '';
//     $tr = str_replace('#STATUS', $tarefa->legenda(), $modeloTarefa);
//     $tr = str_replace('#ID',     $tarefa->getId(), $tr);
//     $tr = str_replace('#NOME',  $tarefa->getNome(), $tr);
//     $tr = str_replace('#DATALIMITE', $tarefa->getDataLimite(), $tr);
//     $tr = str_replace('#MARCADO', $tarefa->getStatus() == 0 ? 'checked' : '', $tr);
//     $linhasTabela .= $tr;
// }

echo str_replace('#TAREFAS', $linhasTabela, $template);




