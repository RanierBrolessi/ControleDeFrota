<?php
    if(!empty($_GET['id'])){
        include_once('config.php');

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM veiculos WHERE id=$id";
        $result = $conn->query($sqlSelect);

        if($result->num_rows>0){
            while($user_data = mysqli_fetch_assoc($result)){
                $placa = $user_data['placa'];
                $modelo = $user_data['modelo'];
                $ano = $user_data['ano'];
                $combustivel = $user_data['combustivel'];                
            }
        }
        else{
            header('Location: Administrador.php');
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
    <button onclick="window.location.href='Administrador.php';">Voltar</button>
    <div class="box">
        <form action="saveEdit_veiculo.php" method="POST">
            <fieldset>
                <legend><b>Edição</b></legend>
                <br><br>
                <div class="inputBox">
                    <label for="placa">placa:</label>
                    <input type="text" name="placa" id="placa" class="inputUser" value="<?php echo $placa ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="modelo">modelo:</label>
                    <input type="text" name="modelo" id="modelo" class="inputUser" value="<?php echo $modelo ?>" required>
                </ano>
                <br><br>
                <div class="inputBox">
                    <label for="ano">Ano de fabricação:</label>
                    <input type="number" name="ano" id="ano" class="inputUser" value="<?php echo $ano ?>" required>
                </div>
                <br><br>
                <p>Combustível</p>
                    <input type="radio" id="Gasolina" name="combustivel" value="Gasolina" <?php echo ($combustivel == 'Gasolina') ? 'checked' : ''?> required>
                    <label for="Gasolina">Gasolina</label>
                    <input type="radio" id="Diesel" name="combustivel" value="Diesel" <?php echo ($combustivel == 'Diesel') ? 'checked' : ''?> required>
                    <label for="Diesel">Diesel</label>
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" id="update"></input>
            </fieldset>
        </form>
    </div>
</body>