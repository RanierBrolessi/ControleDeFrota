<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <title> Controle Frota </title>
</head>
<body>
    <script src="js/bootscrap.bundle.min.js"></script>
</body>
</html>
<?php
// Conexão com o banco de dados
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'controle_frota';

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Função para verificar o login
function verificarLogin($email, $senha)
{
    global $conn;
    $email = mysqli_real_escape_string($conn, $email);
    $senha = mysqli_real_escape_string($conn, $senha);

    $query = "SELECT id, nome, tipo FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    return null;
}

// Verifica o envio do formulário de login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = verificarLogin($email, $senha);

    if ($usuario) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header('Location: controle_frota.php');
        exit();
    } else {
        $mensagem = "Usuário ou senha inválidos.";
    }
}

// Verifica se o usuário está logado
session_start();
if (!isset($_SESSION['usuario'])) {
    // Exibe o formulário de login
    ?>

    <h2>Login</h2>
    <?php if (isset($mensagem)) {
        echo '<p>' . $mensagem . '</p>';
    } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="email">Usuario:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" name="login" value="Entrar">
    </form>

    <?php
    exit();
}

// Verifica o tipo de usuário logado
$usuario = $_SESSION['usuario'];
$tipoUsuario = $usuario['tipo'];

// Verifica se é administrador
if ($tipoUsuario == 'Administrador') {
    // Exibe as funcionalidades do administrador
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: Administrador.php');
    echo '<h2>Painel do Administrador</h2>';
    echo '<p>Bem-vindo, ' . $usuario['nome'] . '!</p>';
    echo '<p>Aqui estão as funcionalidades disponíveis para o Administrador:</p>';
    // ...
} elseif ($tipoUsuario == 'Motorista') {
    // Exibe as funcionalidades do motorista
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: Motorista.php');
    echo '<h2>Painel do Motorista</h2>';
    echo '<p>Bem-vindo, ' . $usuario['nome'] . '!</p>';
    echo '<p>Aqui estão as funcionalidades disponíveis para o Motorista:</p>';
    // ...
} elseif ($tipoUsuario == 'Mecânico') {
    // Exibe as funcionalidades do mecânico
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: Mecanico.php');
    echo '<h2>Painel do Mecânico</h2>';
    echo '<p>Bem-vindo, ' . $usuario['nome'] . '!</p>';
    echo '<p>Aqui estão as funcionalidades disponíveis para o Mecânico:</p>';
    // ...
}
// Encerra a conexão com o banco de dados
mysqli_close($conn);
?>
