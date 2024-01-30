<?php
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['password']))
    {
            include_once('config.php');
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM usuarios WHERE email = '$usuario' and senha = '$password'";

            $result = $conn -> query($sql);
            
            if(mysqli_num_rows($result) <1 )
            {
                unset($_SESSION['usuario']);
                unset($_SESSION['password']);
                header('Location: controle_frota.php');
            }
            else if($usuario == 'Administrador' || $usuario == 'administrador'){
                    header('Location: Administrador.php');
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['password'] = $password;
                }
            else if($usuario == 'Motorista' || $usuario == 'motorista'){
                    header('Location: Motorista.php');
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['password'] = $password;

                }
            else if($usuario == 'Mecanico' || $usuario == 'mecanico'){
                    header('Location: Mecanico.php');
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['password'] = $password;
                    
                }
            
            }
    else
    {
        header('Location: controle_frota.php');
    }
?>