<?php
    if(!empty($_GET['id'])){
        include_once('config.php');

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM manutencao WHERE id=$id";
        $result = $conn->query($sqlSelect);

        if($result->num_rows>0){
            while($user_data = mysqli_fetch_assoc($result)){
                $manutencao = $user_data['ult_manutencao'];
                $servico = $user_data['servico'];
                $km_atual = $user_data['km_atual'];      
            }
        }
        else{
            header('Location: Mecanico.php');
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
    <button onclick="window.location.href='Mecanico.php';">Voltar</button>
    <div class="box">
        <form action="save_edit_manutencao.php" method="POST">
            <fieldset>
                <legend><b>Edição</b></legend>
                <br><br>
                <div class="inputBox">
                    <label for="ult_manutencao">Ultima manutenção:</label>
                    <input type="text" name="ult_manutencao" id="ult_manutencao" class="inputUser" value="<?php echo $manutencao ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="servico">Serviço:</label>
                    <input type="text" name="servico" id="servico" class="inputUser" value="<?php echo $servico ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="km_atual">KM Atual:</label>
                    <input type="text" name="km_atual" id="km_atual" class="inputUser" value="<?php echo $km_atual ?>" required>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update"></input>
            </fieldset>
        </form>
    </div>
</body>