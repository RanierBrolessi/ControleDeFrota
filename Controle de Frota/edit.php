<?php
    if(!empty($_GET['id'])){
        include_once('config.php');

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM motoristas WHERE id=$id";
        $result = $conn->query($sqlSelect);

        if($result->num_rows>0){
            while($user_data = mysqli_fetch_assoc($result)){
                $nome = $user_data['nome'];
                $carteira = $user_data['carteira'];
                $validade = $user_data['validade'];
                $contato = $user_data['contato'];                
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
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Edição</b></legend>
                <br><br>
                <div class="inputBox">
                    <label for="nome">Nome completo:</label>
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="carteira">Carteira de Motorista:</label>
                    <input type="text" name="carteira" id="carteira" class="inputUser" value="<?php echo $carteira ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="validade">Validade da Carteira:</label>
                    <input type="date" name="validade" id="validade" class="inputUser" value="<?php echo $validade ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="contato">Contato:</label>
                    <input type="text" name="contato" id="contato" class="inputUser" value="<?php echo $contato ?>" required>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update"></input>
            </fieldset>
        </form>
    </div>
</body>