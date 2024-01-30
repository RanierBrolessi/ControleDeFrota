<?php
    if(!empty($_GET['id'])){
        include_once('config.php');

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM uso WHERE id=$id";
        $result = $conn->query($sqlSelect);

        if($result->num_rows>0){
            while($user_data = mysqli_fetch_assoc($result)){
                $veiculo = $user_data['veiculo'];
                $abastecimento = $user_data['abastecimento'];
                $km_saida = $user_data['km_saida'];
                $km_volt = $user_data['km_volt'];
                $combustivel = $user_data['combustivel'];
                $valor_abast = $user_data['valor_abast'];        
            }
        }
        else{
            header('Location: Motorista.php');
        }
    
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title> Editar</title>
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
        <form action="save_edit_uso.php" method="POST">
            <fieldset>
                <legend><b>Edição</b></legend>
                <br><br>
                <div class="inputBox">
                    <label for="veiculo">Veículo:</label>
                    <input type="text" name="veiculo" id="veiculo" class="inputUser" value="<?php echo $veiculo ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="abastecimento">Data do abastecimento:</label>
                    <input type="date" name="abastecimento" id="abastecimento" class="inputUser" value="<?php echo $abastecimento ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="km_saida">KM de saída:</label>
                    <input type="number" name="km_saida" id="km_saida" class="inputUser" value="<?php echo $km_saida ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="km_volt">KM de volta:</label>
                    <input type="number" name="km_volt" id="km_volt" class="inputUser" value="<?php echo $km_volt ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="combustivel">Quantidade de combustível:</label>
                    <input type="number" name="combustivel" id="combustivel" class="inputUser" value="<?php echo $combustivel ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="valor_abast">Valor abastecido:</label>
                    <input type="number" placeholder="R$"name="valor_abast" id="valor_abast" class="inputUser" value="<?php echo $valor_abast ?>" required>
                </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" id="update"></input>
            </fieldset>
        </form>
    </div>
</body>