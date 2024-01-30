<?php
    if(isset($_POST['update'])){
        include_once('config.php');

        $placa = $_POST['placa'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $combustivel = $_POST['combustivel'];
    
        $result = mysqli_query($conn, "INSERT INTO veiculos (placa,modelo,ano,combustivel) VALUES ('$placa', '$modelo', '$ano', '$combustivel')" );
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title> Cadastra Veículo</title>
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
<button onclick="window.location.href='Administrador.php';">Voltar</button>
    <div class="box">
        <form action="cadastro_veiculo.php" method="POST">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br><br>
                <div class="inputBox">
                    <label for="placa">Placa do carro:</label>
                    <input type="text" name="placa" id="placa" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="modelo">Modelo:</label>
                    <input type="text" name="modelo" id="modelo" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="ano">Ano de fabricação:</label>
                    <input type="number" name="ano" id="ano" class="inputUser" required>
                </div>
                <br><br>
                <p>Combustível</p>
                    <input type="radio" id="Gasolina" name="combustivel" value="Gasolina" required>
                    <label for="Gasolina">Gasolina</label>
                    <input type="radio" id="Diesel" name="combustivel" value="Diesel" required>
                    <label for="Diesel">Diesel</label>
                    <br><br>
                    <input type="submit" name="update" id="update"></input>
                </div>
            </fieldset>
        </form>
    </div>
</body> 