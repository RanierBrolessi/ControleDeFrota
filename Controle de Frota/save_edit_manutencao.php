<?php
    include_once('config.php');
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $manutencao = $_POST['ult_manutencao'];
        $servico = $_POST['servico'];
        $km_atual = $_POST['km_atual'];

        $sqlUpdate = "UPDATE manutencao SET ult_manutencao ='$manutencao',servico='$servico',km_atual='$km_atual' WHERE id='$id'";
        $result = $conn->query($sqlUpdate);
    }
    header('Location: Mecanico.php');
?>