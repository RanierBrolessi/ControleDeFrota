<?php
    if(isset($_POST['update'])){
    include_once('config.php');

    $manutencao = $_POST['ult_manutencao'];
    $servico = $_POST['servico'];
    $km_atual = $_POST['km_atual'];

    $result = mysqli_query($conn, "INSERT INTO manutencao (ult_manutencao,servico,km_atual) VALUES ('$manutencao', '$servico', '$km_atual')" );
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title> Cadastra manutencao</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform:translate(-50%, -50%);
            background-color: rgba(0,0,0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border:1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color:dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        #update{
            background-image: linear-gradient(to right, rgb(0,92,197), rgb(90,20,220));
            width: 100%;
            border: none;
            padding: 15px;
            color:white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #update:hover{
            background-image: linear-gradient(to right, rgb(0,80,172), rgb(80,19,195));
        }
    </style>
</head>
<body>
<button onclick="window.location.href='Mecanico.php';">Voltar</button>
    <div class="box">
        <form action="cadastro_manutencao.php" method="POST">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br><br>
                <div class="inputBox">
                    <label for="ult_manutencao">Ultima manutenção:</label>
                    <input type="date" name="ult_manutencao" id="ult_manutencao" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="servico">Serviço:</label>
                    <input type="text" name="servico" id="servico" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="km_atual">KM Atual:</label>
                    <input type="text" name="km_atual" id="km_atual" class="inputUser" required>
                </div>
                <br><br>
                <input type="submit" name="update" id="update"></input>
            </fieldset>
        </form>
    </div>
</body>