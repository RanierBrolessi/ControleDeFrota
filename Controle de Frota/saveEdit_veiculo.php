<?php
    include_once('config.php');
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $placa = $_POST['placa'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $combustivel = $_POST['combustivel']; 

        $sqlUpdate = "UPDATE veiculos SET placa ='$placa',modelo='$modelo',ano='$ano',combustivel='$combustivel' WHERE id='$id'";
        $result = $conn->query($sqlUpdate);
    }
    header('Location: Administrador.php');
?>