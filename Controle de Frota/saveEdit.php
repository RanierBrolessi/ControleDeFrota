<?php
    include_once('config.php');
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $carteira = $_POST['carteira'];
        $validade = $_POST['validade'];
        $contato = $_POST['contato']; 

        $sqlUpdate = "UPDATE motoristas SET nome ='$nome',carteira='$carteira',validade='$validade',contato='$contato' WHERE id='$id'";
        $result = $conn->query($sqlUpdate);
    }
    header('Location: Administrador.php');
?>