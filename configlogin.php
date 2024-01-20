<?php 
session_start();
//print_r($_REQUEST);

//Verificar se a variavel existe

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
    include_once('conexao.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    //print_r( 'Email: ' . $email);
    //Verificar se existe no banco
    $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

    //Executar no banco
    $result = $conn->query($sql);
    
    if(mysqli_num_rows($result) <1)
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['nome']);
        header('Location: login.php');
        }

    else
    {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['nome'] = $nome;
        header('Location: index.php');
    }

    //print_r($result);
}

//se não exixtir a variavel retorna ao login
else
{
    header('location: login.php');
}
?>