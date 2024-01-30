<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset ($_SESSION['password']) == true))
    {
        header('Location: controle_frota.php');
    }
    $logado = $_SESSION['usuario'];
    include_once('config.php');
    $sql = "SELECT * FROM manutencao ORDER BY id DESC";    
    $result = $conn->query($sql);   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title> Mecânico</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ultima Manutenção</th>
                <th scope="col">Serviço</th>
                <th scope="col">KM Atual</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>". $user_data['id']."</td>";
                    echo "<td>". $user_data['ult_manutencao']."</td>";
                    echo "<td>". $user_data['servico']."</td>";
                    echo "<td>". $user_data['km_atual']."</td>";
                    echo "<td>
                        <a class='btn btn-primary' href='edit_manutencao.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg>
                        </a>
                    </td>";
                }            
?>
        <div> <a class="btn btn-primary" href="sair.php"> Sair</a></div>
        <br>
        <button onclick="window.location.href='cadastro_manutencao.php';" type="button" class="btn btn-primary"> Cadastrar manutenção</button>