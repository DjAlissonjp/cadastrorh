<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf8" />
<title>Autenticando usuario</title>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
<script type="text/javascript">
function loginsuccessfully() {
    setTimeout("window.location='painel.php'", 5000);
}
function loginfailed(){
    setTimeout ("window.location='login.php'", 5000);
}
</script>
</head>
<body>
<?php         
$host = "localhost";
$user = "root";
$pass = "";
$banco = "cadastro";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error ());
mysqli_select_db($conexao, $banco) or die(mysqli_error());
//codigo PHP
$email=$_POST['email'];
$senha=$_POST['senha'];
$sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'") or die(mysqli_error());
$row = mysqli_num_rows($sql);
if($row > 0 ) {
    session_start();
    $_SESSION['email']=$_POST['email'];
    $_SESSION['senha']=$_POST['senha'];
    echo "<center>Você foi autenticado com Sucesso</center>";
    echo "<script>loginsuccessfully()</script>";    
    } else {
        echo "<center>Nome de usuario ou senha invalido! tentar novamente.</center>";
        echo "<script>loginfailed()</script>";
    }
?>
</body>

</html>