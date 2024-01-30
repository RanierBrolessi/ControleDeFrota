<?php
    include_once('config.php');
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $veiculo = $_POST['veiculo'];
        $abastecimento = $_POST['abastecimento'];
        $km_saida = $_POST['km_saida'];
        $km_volt = $_POST['km_volt'];
        $combustivel = $_POST['combustivel'];
        $valor_abast = $_POST['valor_abast'];

        $sqlUpdate = "UPDATE uso SET veiculo ='$veiculo',abastecimento='$abastecimento',km_saida='$km_saida',km_volt='$km_volt',combustivel='$combustivel',valor_abast='$valor_abast' WHERE id='$id'";
        $result = $conn->query($sqlUpdate);
    }
    header('Location: Motorista.php');
?>