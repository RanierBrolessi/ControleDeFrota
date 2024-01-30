<?php
    if(isset($_POST['update'])){
        include_once('config.php');

        $veiculo = $_POST['veiculo'];
        $abastecimento = $_POST['abastecimento'];
        $km_saida = $_POST['km_saida'];
        $km_volt = $_POST['km_volt'];
        $combustivel = $_POST['combustivel'];
        $valor_abast = $_POST['valor_abast'];
    
        $result = mysqli_query($conn, "INSERT INTO uso (veiculo,abastecimento,km_saida,km_volt,combustivel,valor_abast) VALUES ('$veiculo', '$abastecimento', '$km_saida', '$km_volt', '$combustivel', '$valor_abast')" );
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
<button onclick="window.location.href='Motorista.php';">Voltar</button>
    <div class="box">
        <form action="cadastro_uso.php" method="POST">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br><br>
                <div class="inputBox">
                    <label for="veiculo">Veículo:</label>
                    <input type="text" name="veiculo" id="veiculo" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="abastecimento">Data do abastecimento:</label>
                    <input type="date" name="abastecimento" id="abastecimento" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="km_saida">KM de saída:</label>
                    <input type="number" name="km_saida" id="km_saida" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="km_volt">KM de volta:</label>
                    <input type="number" name="km_volt" id="km_volt" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="combustivel">Quantidade de combustível:</label>
                    <input type="number" name="combustivel" id="combustivel" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="valor_abast">Valor abastecido:</label>
                    <input type="number" placeholder="R$"name="valor_abast" id="valor_abast" class="inputUser" required>
                </div>
                <br><br>
                    <input type="submit" name="update" id="update"></input>
                </div>
            </fieldset>
        </form>
    </div>
</body> 