<?php
    $host = '127.0.0.1';
    $user = 'root';
    $password = '';
    $database = 'controle_frota';

        $conn = mysqli_connect($host, $user, $password, $database);
        if (!$conn) {
            die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>